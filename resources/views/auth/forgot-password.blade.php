<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        <a href="/">
            <img src="{{asset('images/logo.png')}}" alt="logo" class="img mb-4" style="width:7rem;height : 6rem">
            </a>
            <h2 class="text-uppercase text-white font-bold mb-3">Plan your task</h2>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 text-align-center" style="text-align: center;">
        <h1 class="text-uppercase title">Mot de passe oublié</h1>
            Vous avez oublié votre mot de passe ? Pas de problème !!!
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-center mt-4 mb-4">
                <x-button>
                    Récupérer le mot de passe
                </x-button>
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
        font-size: 1.2rem;
        text-align: center;
        font-weight: bold;
        margin-bottom: 1rem!important;
        margin-top: 1rem!important;
    }
</style>