<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hour;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class calculetedHours extends Controller
{

    /*
        Nessa funcao eu pego um valor 00:00:00 como referencia 
        coloco um novo valor para $date com interval1
        e dps adiciono  um novo valor assim obtendo como resultado
        o valor de um intervalo entre eles 

        usamos o diff pra poder obter essa diferenca entre eles 
        
    */
    function sumIntervals($interval1, $interval2) {
        $date = new \DateTime('00:00:00');
        $date->add($interval1);
        $date->add($interval2);
        return (new \DateTime('00:00:00'))->diff($date);
    }

    /*
        Nessa funcao eu pego um valor 00:00:00 como referencia 
        coloco um novo valor para $date com interval1
        e dps faço uma subtração com o interval2
        como resuitado tenho a subtracao entre eles 
        tempo restante por assim dizer 

         usamos o diff pra poder obter essa diferenca entre eles 
        
    */

    function subtractionIntervals($interval1, $interval2) {
        $date = new DateTime('00:00:00');
        $date->add($interval1);
        $date->sub($interval2);
        return (new DateTime('00:00:00'))->diff($date);
    }


     function convertIntervalToDate($interval){
        return new DateTime($interval->format('%H:%i:s'));
     }

     function convertStringToDate($string) {
        return DateTimeImutable::createFromFormat('H:i:s', $string);
     }



     public function nextTime(){
        if(!$this->time1) return 'time1';
        if(!$this->time2) return 'time2';
        if(!$this->time3) return 'time3';
        if(!$this->time4) return 'time4';
        return null;
    
      }


/*
      Nesta funcao nos pegamos o time1 e verificamos a data atual obtendo a quantidade 
      de horas trabalhadas 
      para o time2 pegamos o time1 menos o 2 e obtemos as horas trabalhadas
      usamo a mesma logica para time3 e 4 
    
*/

    private function   getWorkedIntervals(){
        [$t1, $t2, $t3, $t4] = $this->getTimes();

        $part1 = new \DateInterval('PT0S');
        $part2 = new \DateInterval('PT0S');

        if ($t1) $part1 = $t1->diff(new \DateTime());
        if ($t2) $part1 = $t1->diff($t2); 

        if ($t3) $part2 = $t3->diff(new \DateTime());
        if ($t4) $part2 = $t3->diff($t4); 
        
        return $this->sumIntervals($part1, $part2);
        
      }
      

      

        /*
        Estou pegando do array os elementos t2 t3 verificando se estao setados 
        e dps estou usando o valor de referencia no t2 para ter o incio da conta 
        e dps comparando com t3 setado temos a quantidade | tempo total de almoço 

        */

    function getLunchInterval() {
        [, $t2, $t3,] = $this->getTimes();

        $brakInterval = new \DateInterval('PT0S');

        if ($t2) $brakInterval = $t2->diff(new \DateTime());
        if ($t3) $brakInterval = $t2->diff($t3); 

        return $brakInterval;
    }

    /*
        Aqui nós calculamos alguns casos sendo eles se o usuario nao tiver batido o t1 
        pegamos o horario atual e somamos 8 horas de trabalho (assim tendo uma estimativa)
        e temos um elseIf caso ele já tenha batido o t4 ou seja bateu todos os pontos entao a saida 
        é justamente o t4
        além disso caso nao seja nenhum dos dois casos dos pegamos o valor de $workDay e somamos 
        com o valor do intervalo  para poder ter outra estimativa 
    */

   private function getExitWork() {
        [$t1,,, $t4] = $this->getTimes();
        $workDay = new \DateInterval('PT8H');
        

        if (!$t1) {
            return (new  \DateTime())->add($workDay);
        } elseif ($t4) {
            return $t4;
        } else {
            $total = $this->sumIntervals($workDay, $this->getLunchInterval());
            return $t1->add($total);
        }
    }



    /*
        Aqui nos verificamos a existencia de time1 á 4 e adicionamos ele em um array
        claro pegando o Id do usuario logado
    */


      private function getTimes() {

        $user = Auth::user();
        $userId = $user->id;

        $latestRecord = Hour::where('user_id', $userId)
            ->latest()
            ->first();


        $times = [];


        if ($latestRecord) {
            $times[] = $latestRecord->time1 ?  new \DateTimeImmutable($latestRecord->time1) : null;
            $times[] = $latestRecord->time2 ? new \DateTimeImmutable($latestRecord->time2) : null;
            $times[] = $latestRecord->time3 ? new \DateTimeImmutable($latestRecord->time3) : null;
            $times[] = $latestRecord->time4 ? new \DateTimeImmutable($latestRecord->time4) : null;

        } else {
            $times = [null, null, null, null];
        }

        return $times;

    }

    /*
        Nesta função nos pegamos o ultimo registro encontrado no ID logado 
        dps pegamos esse valor e passamos ele para a variavel $workedInterval e atribuimos
        a funcao  getWorkedIntervals passando o formato Hora Minuto e segundo
        e então retornamos esse valor para ser usado no AppServiceProvider

        e nela executamos uma funcao de calback que faz com que esse variavel seja carregada 
        antes de chamar a view para que ela esteja disponivel em todas as view 
    */

   public function displayHoursWorked() {
        $user = Auth::User(); 
        $userId = $user->id;
        $latestRecord = Hour::where('user_id', $userId)
        ->latest()
        ->first();

        $workedInterval = $this->getWorkedIntervals()->format('%H:%I:%S');
       $exitTime =  $this->getExitWork()->format('H:i:s');

       $result = [
        'workedInterval' => $workedInterval,
        'exitTime' => $exitTime,
    ];

        return $result;

    }

 

}

