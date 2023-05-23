@extends('layouts.master')

@section('title', 'Login')

@section('content')

    <body style="background-color: #4e73df">

        <div class="container">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <x-guest-layout>
                                    <x-authentication-card>
                                        <x-slot name="logo"></x-slot>

                                        <x-validation-errors class="mb-4" />

                                        @if (session('status'))
                                            <div class="mb-4 font-medium text-sm text-green-600">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div>
                                                <x-label for="email" value="{{ __('E-mail') }}" />
                                                <x-input id="email" class="block mt-1 w-full" type="email"
                                                    name="email" :value="old('email')" required autofocus
                                                    autocomplete="username" placeholder="Digite o seu e-mail"/>
                                            </div>

                                            <div class="mt-4">
                                                <x-label for="password" value="{{ __('Senha') }}" />
                                                <x-input id="password" class="block mt-1 w-full" type="password"
                                                    name="password" placeholder="Digite sua senha" required autocomplete="current-password" />
                                            </div>

                                            <div class="block mt-4">
                                                <label for="remember_me" class="flex items-center">
                                                    <x-checkbox id="remember_me" name="remember" />
                                                    <span class="ml-2 text-sm text-gray-600">{{ __('Lembrar-me') }}</span>
                                                </label>
                                            </div>

                                            <div class="flex items-center justify-end mt-4">
                                                @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                        href="{{ route('password.request') }}">
                                                        {{ __('Esqueceu sua senha?') }}
                                                    </a>
                                                @endif

                                                <x-button class="ml-4">
                                                    {{ __('Entrar') }}
                                                </x-button>
                                            </div>
                                        </form>
                                    </x-authentication-card>
                                </x-guest-layout>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </body>
@endsection
