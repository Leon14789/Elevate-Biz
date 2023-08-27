@extends('layouts.main')
@section('title', 'Configurações')

@section('content')

<x-titles-pages 
    iconClass="icofont-duotone icofont-cogs"
    title="Selecione as configurações"
    subtitle="Preferencias do Usuario:" />

    <div class="card">
        <div class="card-header">
           <h3>Selecione o tema desejado:</h3>
        </div>
        <div class="card-body">

            <div class="d-flex m-3 justify-content-around">
            <a href="{{ route('standardTheme') }}" class="button">
            <i class="icofont-duotone icofont-home icofont-1x"></i>
                 Padrão
                </a>

                <a href="{{ route('lithTheme') }}" class="button">
                <i class="icofont-duotone icofont-eye-open icofont-1x"></i>
                Minimalistico
                </a>
            </div>
            
            <div class="d-flex m-3 justify-content-around">
            <a href="{{ route('darkTheme') }}" class="button">
                <i class="icofont-duotone icofont-dark-mode icofont-1x"></i>
                    Noturno
                </a>

                <a href="{{ route('devTheme') }}" class="button">
                <i class="icofont-duotone icofont-bug icofont-1x"></i>
                    Desenvolvedor
                </a>

            </div>
            
        </div>
    </div>
    

@endsection