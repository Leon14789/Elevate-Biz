<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
        <label  for="name" :value="__('Name')">Nome:</label>
        <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Insira seu Nome" >
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email  -->
        <div class="mt-4">
        <label for="email" :value="__('Email')">Email</label>
        <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Insira seu Email" >
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">

        <label  for="password" :value="__('Password')">Senha</label>
        <input type="password" placeholder="Insira sua Senha" id="password" 
                            class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">

        <label  for="password_confirmation" :value="__('Confirm Password')">Confirme sua Senha</label>
        <input type="password" placeholder="Confirme sua Senha" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
        <button class="ml-4">  {{ __('Cadastrar') }}</button>
        
        </div>
    </form>
</x-guest-layout>
