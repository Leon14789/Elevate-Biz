
  


   
@extends('layouts.main')

@section('title', 'Vizualizar Usuario')


@section('content')
<link rel="stylesheet" href="/assets/css/login/registre.css">

<x-titles-pages 
    iconClass="icofont-duotone icofont-file-check"
    title="Editar Usuario"
    subtitle="{{$user->name}}" />

    <div class="card">
    <form method="post" action="{{ route('update', $user->id) }}">
    @method('PUT');    
    @csrf
 <!-- Validation Errors -->
 <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <!-- Name -->
    <div class="form-flex">

        <div class="two-elements">
            <label  for="name" value="{{$user->name}}">Nome:</label>
            <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}" required autofocus autocomplete="name" placeholder="Insira seu Nome" >
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            
            <!-- Email  -->
            <label for="email" :value="{{$user->email}}">Email</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$user->email}}" required autocomplete="username" placeholder="Insira seu Email" >
            
        </div>
      

      
        <div class="">
            <!-- Password -->
            <label class="mr-2" for="is_admin" :value="{{$user->is_admin}}">Selecione</label>
                <select class="box" placeholder="Selecione" id="is_admin"  name="is_admin" >
                    <option value="0">Funcionário</option>
                    <option value="1">Administrador</option>
                </select>


        
           
        </div>


         <!-- date admission -->
         <div class="two-elements">
         <label class="mr-2" for="start_date" :value="{{$user->star_date}}">Admissão:</label>
        <input type="date"  id="start_date" class="block mt-1 w-full"
                    name="start_date" value="{{$user->start_date}}">

         <label class="mr-2" for="end_date" :value="{{$user->end_date}}">Desligamento</label>
            <input type="date"  id="end_date" class="block mt-1 w-full"
                    name="end_date" value="{{$user->end_date}}">


            
      
        </div>

         <!-- Button -->
         <div class="two-elements">
           
             <button class="ml-4">  BOTAO</button>
        </div>

      

       
      

    </div>
    </form>
    </div>

@endsection
