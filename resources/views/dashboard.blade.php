<!-- Este cara esta extendendo da main ou seja tudo que tem lá tera aqui  -->
@extends('layouts.main')
<!--  para o titulo vir tinamicamente definimos a section 
    chamamos o title seguido de virgula dps 'o titulo' -->
@section('title', 'Nome Da Empresa')

<!--  e para reidenizar o conteudo dinamicamente chamamos 
    a section novamente e dps content -->
@section('content')

<x-titles-pages 
    iconClass="icofont-duotone icofont-home"
    title="Nome da Empresa"
    subtitle="Bordao da Empresa" />
    <div class="card">
        <div class="card-header">
          
        </div>
        <div class="card-body">
            <img class="img-class" src="{{ asset('assets/images/img-logo.png') }}" alt="Logo">
        </div>
    </div>



@endsection