<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hour;
use Illuminate\Support\Facades\Auth;

class reportsMonthly extends Controller

{

   
    /*
        Aqui pegamos os segundos e dividimos por 3600 (quat de segundos e uma hora)
        pegamos o modulo disso e dividimos por 60 para obter os minutos 
        e por fim pegamos os segundos e subtraimos pelos valores encontrados para 
        obter os segundos 
    */
    function getTimeStringFromSeconds($seconds) {
        $h = intdiv($seconds, 3600);
        $m = intdiv($seconds % 3600, 60);
        $s = $seconds % 60;

        return sprintf('%02d:%02d:%02d', $h, $m, $s);
        

    }

    function isWeekend($date) {
        $inputDate = $this->getDateAsDateTime($date);
        return $inputDate->format('N') >= 6;
    }

    function isBefore($date1, $date2) {
        $inputDate1 = $this->getDateAsDateTime($date1);
        $inputDate2 = $this->getDateAsDateTime($date2);
        return $inputDate1 <= $inputDate2;

    }

    /*
        Verificando se o fia é final de semana e esta no passado 
    */

    function isPastWorkedDay($date) {
        return !$this->isWeekend($date) && $this->isBefore($date, new \DateTime());
    }



    /*
        Nesta Funcao verificamos se o valor da variavel é uma string caso sim 
        nos a transformamos em um date e caso ele nao for mantemos o valor original 
        imaginando que já seja um date
    */

    function getDateAsDateTime($date){
        return is_string($date) ? new \DateTime($date) : $date; 
    }

    /*
        Nesta funcao pegamos o Primeiro dia de Quaquer mes
    */


    public   function getFirstDayMonthly($date) {

        
        
        $time = $this->getDateAsDateTime($date)->getTimestamp();
        return new \DateTime(date('Y-m-1', $time));

    
        
    }

    /*
        Nesta funcao pegamos o Ultimo dia de Quaquer mes
    */


   public function getLastDayMonthly($date) {
      
       $time = $this->getDateAsDateTime($date)->getTimestamp();
       return new \DateTime(date('Y-m-t', $time));
     
    }

    /*
         Aqui damos inicio ao uso das funcoes criadas anteriormente 
         e atribuimos elas a variaveis 

         fazemos tmb uma consulta passando como filtro o Id so usuario 
         e usando disso para fazer uma consulta usando o whereDate (filtro que funciona 
         igual ao beetwin porem ele inclui as varivaeis de filtro isto é o starDate como resultado)

         dps nos usando um foreach passando neles todos os resultados (como se fossem linhas colunas)
         e atribuimos ele a nossa variavel registries (array) e usamos a work_date como key pra isso 

         
    */

    public  function getMonthlyReports($userId, $date) {
      

        $registries = [];
        $startDate = $this->getFirstDayMonthly($date);
        $endDate = $this->getLastDayMonthly($date);

        $results = Hour::where('user_id', $userId)
        ->whereDate('work_date', '>=', $startDate)
        ->whereDate('work_date', '<=', $endDate)
        ->get();

       
        foreach ($results as $result) {
            $registries[$result->work_date] = $result;
        }
           return $registries;
            
    }

   
    /*
         Esta funcao utiliza de algumas funcoes como getMonthlyReports
         e nela nos passamo o Id do usuario e a data para a funcao getMonthlyReports
         e para a funcao getLastDayMonthly nos passamos o dia 

         e dentro do for nos pegamos concatenamos a data com a variavel day passando 
         dois caracteres caso o dia esteja entre 1 e 9 

         apos isso nos criamos uma variavel registry e acessamos os registros encontrados na funcao 

         getMonthlyReports (mais especificamente o valor $date worked_time) e caso nao encontre algo ele retorna
         null

         no if nos verificamos se esse registry esta setado caso sim ele ira 
         dar um array_push($report, $registry); ou seja ira atribuir os registros no report

         e ira fazer uma atribuicao concatenativa em  $sumOfworkedTime += $registry->worked_time;

         e se o valor nao estiver instanciado ele ira chamar o work_date passado a variavel $date
         e colocara o worked_time como 0

         ou seja o valor final a ser passado dos registros esta em report

         para calcular o tempo experado que o usuario tenha trabalho usamos a variavel expectedTIme 
         passando a constante de config DAILY_TIME
    */

    public function reportsMonthly() {
        $user = Auth::User(); 
        $userId = $user->id;
       

        $currentDate = new \DateTime();
        $registries = $this->getMonthlyReports($userId, $currentDate);
        $report = [];
        $workDay = 0;
        $sumOfworkedTime = 0;
        $lastDay = $this->getLastDayMonthly($currentDate)->format('d');
       
        for ($day = 1; $day <= $lastDay; $day++) { 
           $date = $currentDate->format('Y-m') . '-' . sprintf('%02d',$day);
           $registry = $registries[$date] ?? null;
        
           if($this->isPastWorkedDay($date)) $workDay++;

           if ($registry) {
            $sumOfworkedTime += $registry->worked_time;
            $registry->work_date = date('d-m-Y', strtotime($registry->work_date));
            $registry->time1 = date('H:i:s', strtotime($registry->time1));
            $registry->time2 = date('H:i:s', strtotime($registry->time2));
            $registry->time3 = date('H:i:s', strtotime($registry->time3));
            $registry->time4 = date('H:i:s', strtotime($registry->time4));
                array_push($report, $registry);
                $balance = $registry->worked_time - config('app.constants.DAILY_TIME');
                $balanceString = $this->getTimeStringFromSeconds(abs($balance));
                $dailyBalanceAmount = ($balance >= 0) ? "+{$balanceString}" : "-{$balanceString}";
                $registry->dailyBalanceAmount = $dailyBalanceAmount;
            }  else {
            array_push($report, new Hour([
                'work_date' => date('d-m-Y', strtotime($date)),
                'worked_time' => 0,
                'dailyBalanceAmount' => "----------",
               
            ])); 
           
           }

          
        }
     

        $expectedTime = $workDay * config('app.constants.DAILY_TIME');
        $balance = $this->getTimeStringFromSeconds(abs($sumOfworkedTime - $expectedTime));
        $valueExpectedworkeedTime = ($sumOfworkedTime >= $expectedTime) ? "Você tem {$balance} no banco de Horas" : " Você está devendo {$balance} horas ";
        $sumOfworkedTimeconverted = $this->getTimeStringFromSeconds(abs($sumOfworkedTime));


        return view('pages/reports/reportsMonthly', 
         compact(['report', 'dailyBalanceAmount',
         'sumOfworkedTimeconverted', 
         'valueExpectedworkeedTime']));
    }

   
  
  

    
}
