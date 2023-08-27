@extends('layouts.main')
@section('title', 'Usuarios')

@section('content')

<x-titles-pages 
    iconClass="icofont-duotone icofont-cogs"
    title="Selecione as opção desejadas"
    subtitle="Criação | Edição | Exclusão de usuarios" />

            
    
    <div class="summary-boxes">
        <div class="summary-box">
            
            <a href="{{ route('register') }}" class="button">
                <i class="icofont-duotone icofont-click icofont-1x"></i>
                Cadastrar Usuario
            </a>
    </div>
    <div class="summary-box bg-danger">
       
    </div>
</div>

    

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Admissão</th>
                    <th>Desligamento</th>
                    <th>Editar</th>
                    <th>Deletar</th>

                </thead>
           @foreach($users as $user)
                <tbody>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{ $user->start_date }}</td>
                    <td>{{$user->end_date }}</td>
                    <td>
                        
                        <form action="{{ route('edit', $user->id) }}" method="post">
                            @csrf
                            @method('get')
                                <button type="submit" class="button">
                                    <i class="icofont-duotone icofont-manage-user icofont-1x"></i>
                                </button>
                        </form>
                           
                    
                       
                        </td>
                        <td>
                            <form action="{{ route('delete', $user->id) }}" method="post">
                                @csrf
                                @method('get')
                                <button type="submit" class="button">
                                    <i class="icofont-duotone icofont-exit icofont-1x"></i>
                                </button>
                            </form>
                        </td>

        
                </tbody>
            @endforeach
            </table>

@endsection