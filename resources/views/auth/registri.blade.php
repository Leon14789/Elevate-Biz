
  


   
@extends('layouts.main')

@section('title', 'Cadastro')

<!--  e para reidenizar o conteudo dinamicamente chamamos 
    a section novamente e dps content -->
@section('content')
<link rel="stylesheet" href="/assets/css/login/registre.css">
<x-titles-pages 
    iconClass="icofont-duotone icofont-file-check"
    title="Criar Registro"
    subtitle="Crie um novo Registro" />

    <div class="card">
    <form method="POST" action="{{ route('register') }}">
        @csrf
 <!-- Validation Errors -->
 <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <!-- Name -->
    <div class="form-flex">

        <div class="two-elements">
            <label  for="name" :value="__('Name')">Nome:</label>
            <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Insira seu Nome" >
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            
            <!-- Email  -->
            <label for="email" :value="__('Email')">Email</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Insira seu Email" >
            
        </div>
      

      
        <div class="">
            <!-- Password -->
        <label  for="password" :value="__('Password')">Senha</label>
        <input type="password" placeholder="Insira sua Senha" id="password" 
                            class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
           
            <!-- Confirm Password -->
            <label  for="password_confirmation" :value="__('Confirm Password')">Confirme sua Senha</label>
            <input type="password" placeholder="Confirme sua Senha" id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password">
           
        </div>


         <!-- date admission -->
         <div class="two-elements">
            <label class="mr-2" for="start_date" :value="__('start_date')">Admissão:</label>
            <input type="date"  id="start_date" class="block mt-1 w-full"
                    name="start_date">
            
        <!-- Is Admin -->
            <label class="mr-2" for="is_admin" :value="__('is_admin')">Selecione</label>
                <select class="box" placeholder="Selecione" id="is_admin"  name="is_admin">
                    <option value="0">Funcionário</option>
                    <option value="1">Administrador</option>
                </select>
        </div>

         <!-- Button -->
         <div class="two-elements">
           
             <button class="ml-4">  {{ __('Cadastrar') }}</button>
        </div>

      

       
      

    </div>
    </form>
    </div>

@endsection
