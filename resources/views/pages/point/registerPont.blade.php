<!-- Este cara esta extendendo da main ou seja tudo que tem lá tera aqui  -->
@extends('layouts.main')
<!--  para o titulo vir tinamicamente definimos a section 
    chamamos o title seguido de virgula dps 'o titulo' -->
@section('title', 'Registrar Batimento')

<!--  e para reidenizar o conteudo dinamicamente chamamos 
    a section novamente e dps content -->
@section('content')

<x-titles-pages 
    iconClass="icofont-duotone icofont-file-check"
    title="Registre seu Ponto"
    subtitle="Mantenha seu Ponto Consistente" />

    <div class="card">
        <div class="card-header">
            <h3> 
                Dia {{ now()->format('d') }} 
                de {{ now()->format('M') }} 
                de {{ now()->format('Y') }} 
            </h3>
            <p>Batimentos Efetuados Hoje: </p>
        </div>
        <div class="card-body">
            <div class="d-flex m-3 justify-content-around">
            <span class="record">Entrada 1:  {{$time1}}</span>
                <span class="record">Saída 1: {{$time2}}</span>
            </div>
            <div class="d-flex m-3 justify-content-around">
                <span class="record">Entrada 2:   {{$time3}}</span>
                <span class="record">Saída 2:  {{$time4}}</span>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <a href="{{ route('createOrEditRecord') }}" class="button">
                <i class="icofont-duotone icofont-click icofont-1x"></i>
                Bater Ponto
                </a>
            </div>
        </div>
    </div>

@endsection