@extends('layouts.main')

@section('title', 'Confirmar Exclusão')

@section('content')
    <div class="alert alert-danger">
        Este usuário possui registros. Você tem certeza que deseja excluí-lo?
    </div>
    <form action="{{ route('destroyUser', $user->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
        <a href="{{ route('users') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
