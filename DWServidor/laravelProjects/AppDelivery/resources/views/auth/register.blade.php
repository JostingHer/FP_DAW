

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
      <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    

    </head>
    <body>

        <section class="contenedor formulario">
         
            <div class="formulario__grid">
                <div class="formulario__contenido">
                  <h2 class="formulario__heading">
                    Registrate
                   </h2>

                    <form class="formulario__buscar" method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Name -->
                        <div class="formulario__campo">
                            <x-input-label class="formulario__label" for="name" :value="__('Name')" />
                            <x-text-input class="formulario__input" id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" />
                        </div>
        
                        <!-- Email Address -->
                        <div class="formulario__campo">
                            <x-input-label class="formulario__label" for="email" :value="__('Email')" />
                            <x-text-input class="formulario__input" id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" />
                        </div>
        
                        <!-- Phone -->
                        <div class="formulario__campo">
                            <x-input-label class="formulario__label" for="phone" :value="__('Phone')" />
                            <x-text-input class="formulario__input" id="phone" type="tel" name="phone" :value="old('phone')" required autocomplete="phone" />
                        </div>
        
                        <!-- Credit Card -->
                        <div class="formulario__campo">
                            <x-input-label class="formulario__label" for="creditCard" :value="__('Credit Card')" />
                            <x-text-input class="formulario__input" id="creditCard" type="text" name="creditCard" :value="old('creditCard')" required autocomplete="creditCard" />
                        </div>
        
                        <!-- Password -->
                        <div class="formulario__campo">
                            <x-input-label class="formulario__label" for="password" :value="__('Password')" />
                            <x-text-input class="formulario__input" id="password" type="password" name="password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" />
                        </div>
        
                        <!-- Confirm Password -->
                        <div class="formulario__campo">
                            <x-input-label class="formulario__label" for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input class="formulario__input" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" />
                        </div>
        
                        <div class="formulario__footer">
                            <a class="formulario__label" href="{{ route('login') }}">{{ __('Already registered?') }}</a>
                            <x-primary-button class="formulario__submit">
                                {{ __('Registro') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
                <div class="formulario__imagen-contenedor">
                    <img class="formulario__imagen" src="{{ asset('img/dibujo_repartidor.svg') }}" alt="Repartidor img">
                </div>
         </div>

        </section>
        <section>
         <img class="pasos__wave" src="{{ asset('img/wave.svg') }}" alt="imagene wave">

        </section>
    
    </body>
</html>
