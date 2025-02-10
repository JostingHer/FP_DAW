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
                        Iniciar Sesión
                        <br>
                        Si eres cliente habitual, puedes hacer seguimiento de tus pedidos
                    </h2>
                    <form class="formulario__buscar" method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="formulario__campo">
                            <x-input-label class="formulario__label" for="email" :value="__('Email')" />
                            <x-text-input class="formulario__input" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" />
                        </div>

                        <!-- Password -->
                        <div class="formulario__campo">
                            <x-input-label class="formulario__label" for="password" :value="__('Password')" />
                            <x-text-input class="formulario__input" id="password" type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" />
                        </div>

                        <!-- Remember Me -->
                        <div class="formulario__campo">
                            <label for="remember_me" class="formulario__label">
                                <input id="remember_me" type="checkbox" name="remember">
                                <span>{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="formulario__footer">
                            @if (Route::has('password.request'))
                                <a class="formulario__label" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                            @endif
                            <x-primary-button class="formulario__submit">
                                {{ __('Iniciar sesión') }}
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
