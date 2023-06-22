

<!-- Este cara esta extendendo da main ou seja tudo que tem lá tera aqui  -->
@extends('layouts.main')

<!--  para o titulo vir tinamicamente definimos a section 
    chamamos o title seguido de virgula dps 'o titulo' -->

@section('title', 'Dashboard')

<!--  e para reidenizar o conteudo dinamicamente chamamos 
    a section novamente e dps content -->
@section('content')


<h1>Aqui esta o conteudo do Dashboard</h1>

@endsection