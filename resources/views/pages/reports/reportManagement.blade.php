@extends('layouts.main')
@section('title', 'Relatorios Gerencial')


@section('content')

<x-titles-pages 
    iconClass="icofont-duotone icofont-file-check"
    title=" Relatorios Gerencial"
    subtitle="Acompanhe os funcionarios" />


<div class="summary-boxes">
    <div class="summary-box bg-primary">
        <i class="icon icofont-duotone icofont-groups"></i>
        <p class="title">Quantidade de Funcionarios</p>
        <h3 class="value">{{$nuberUsers}}</h3>
    </div>
    <div class="summary-box bg-danger">
        <i class="icon icofont-duotone icofont-warning-circle"></i>
        <p class="title">Faltas</p>
        <h3 class="value">{{$numberUsersAbsent}}</h3>
    </div>
</div>

@if($informationsUsersAbsent)
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="card-title"> Faltosos do Dia</h4>
            <p class="card-category mb-0">Relação dos funcionarios que ainda não bateram o ponto</p>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th>Nome</th>
                </thead>
            @foreach ($informationsUsersAbsent as $information) 
                <tbody>
                    <td>{{$information['name']}}</td>
                </tbody>
            @endforeach
            </table>
        </div>
    </div>

@endif
@endsection