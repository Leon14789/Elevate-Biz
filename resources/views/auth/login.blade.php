<x-guest-layout>
   

  
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1>INSIRA SUAS CREDENCIAIS</h1>
        <!-- Email Address -->
        <div>
        <label for="email" :value="__('Email')">Email</label>
        <input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Insira seu Email" id="username">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">


        <labelfor="password" :value="__('Senha')">Senha</label>
        
        <input type="password" placeholder="Insira sua Senha"  id="password" 
                            class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" >           
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

      

        <div class="flex items-center justify-end mt-4">
        <button class="ml-3">{{ __('Conectar') }}</button>
          
        </div>
    </form>
</x-guest-layout>
