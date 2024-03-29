@extends('layouts.main')
@section('title', 'Relatorios Mensais')


@section('content')

<x-titles-pages 
    iconClass="icofont-duotone icofont-file-check"
    title=" Relatorios Mensal"
    subtitle="Acompanhe o Saldo de Horas" />

@if($user->is_admin)
    <form action="{{ route('testando') }}"  class="mb-4" method="POST">
    @csrf
        <div class="input-group">
            <select name="user" class="form-control" >
                    <option value='null'>  Selecione o Funcionario</option>
                @foreach ($users as $user) 
                        <option value='{{$user->id}}' >  {{$user->name}}</option>
                @endforeach
            </select>
        
            <select name="period" class="form-control ml-2 mr-2" >
                    <option value='null'>  Selecione o Periodo</option>
                @foreach ($periods as $key => $value) 
                    <option value='{{$key}}'>  {{$value}}</option>
                @endforeach
            </select>
                
         

            <button type="submit" class="button">
            <i class="icofont-duotone icofont-folder-open icofont-1x"></i>
        </button>

        </div>
    </form>
@endif


    <div class="card">

   

        <div class="card-header">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td class="bg-primary text-white"><h3>Horas Trabalhadas no mês: {{$sumOfworkedTimeconverted}}</h3></td>
                        <td class="@if ($valueExpectedworkeedTime > 0) bg-primary @else bg-danger @endif text-white">
                            <h3>Saldo Mensal: {{ $valueExpectedworkeedTime }}</h3>
                        </td>

                </tbody>
            </table>

           
            <H3 > </H3>

        </div>

        <div class="card-body">

            @foreach ($report as $registries) 
   
             <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th>Dia</th>
                    <th>Entrada 1</th>
                    <th>Saida 1</th>
                    <th>Entrada 2</th>
                    <th>Saida 2</th>
                    <th>Saldo Diario</th>

                </thead>

                <tbody>
                   <tr>
                   <td>{{ $registries->work_date }}</td>


                    <td>{{$registries->time1}}</td>
                    <td>{{$registries->time2}}</td>
                    <td>{{$registries->time3}}</td>
                    <td>{{$registries->time4}}</td>
                    <td>{{ $registries->dailyBalanceAmount }}</td>

                   </tr>

                </tbody>
             </table>
   
 
   
            @endforeach
        </div>

    </div>


@endsection