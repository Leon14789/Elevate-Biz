<!-- Este cara esta extendendo da main ou seja tudo que tem lá tera aqui  -->
@extends('layouts.main')
<!--  para o titulo vir tinamicamente definimos a section 
    chamamos o title seguido de virgula dps 'o titulo' -->
@section('title', 'Dashboard')

<!--  e para reidenizar o conteudo dinamicamente chamamos 
    a section novamente e dps content -->
@section('content')

<x-titles-pages 
    iconClass="icofont-duotone icofont-file-check"
    title="Registre seu Ponto"
    subtitle="Mantenha seu Ponto Consistente" />

    <div class="card">
        <div class="card-header">
            <h3>10 de Jan de 2023</h3>
            <p>Batimentos Efetuados Hoje: </p>
        </div>
        <div class="card-body">
            <div class="d-flex m-3 justify-content-around">
                <span class="record">Entrada 1: ---</span>
                <span class="record">Saída 1: ---</span>
            </div>
            <div class="d-flex m-3 justify-content-around">
                <span class="record">Entrada 2: ---</span>
                <span class="record">Saída 2: ---</span>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <a href="#" class="btn btn-success btn-lg">
                <i class="icofont-duotone icofont-click icofont-1x"></i>
                Bater Ponto
                </a>
            </div>
        </div>
    </div>

@endsection