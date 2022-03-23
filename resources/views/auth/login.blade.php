<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
            <img src="{{asset('images/logo.png')}}" alt="logo" class="img mb-4" style="width:7rem;height : 6rem">
            </a>
            <h2 class="text-uppercase text-white font-bold mb-3">Plan your task</h2>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="text-uppercase title">Login</h1>
            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" value="Mot de passe" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="d-block items-center justify-center mt-4" style="text-align : center">
             
                <x-button class="mx-auto btn">
                   Je me connecte
                </x-button>
                
                @if (Route::has('password.request'))
                    <a class="underline d-block text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        Mot de passe oulié ?
                    </a>
                @endif
               
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
<style>
    .min-h-screen{
        background-color: #343a40 !important;
    }
    .text-uppercase {
        text-transform: uppercase;
    }
    .btn{
        display : block!important;
        width : 100%;
        margin-bottom: 1rem!important;
    }
    .title{
        font-size: 2rem;
        text-align: center;
        font-weight: bold;
        margin-bottom: 1rem!important;
        margin-top: 1rem!important;
    }
</style>