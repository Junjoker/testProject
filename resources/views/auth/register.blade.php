    <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
            <a href="/">
            <img src="{{asset('images/logo.png')}}" alt="logo" class="img mb-4" style="width:7rem;height : 6rem">
            </a>
            <h2 class="text-uppercase text-white font-bold mb-3">Plan your task</h2>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1 class="text-uppercase title">Register</h1>
            <!-- Name -->
            <div>
                <x-label for="name" value="Nom" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

              <!-- Prenom -->
              <div class="mt-4">
                <x-label for="prenom" value="Prénom" />

                <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
            </div>
              <!-- username -->
              <div class="mt-4">
                <x-label for="username" value="Nom d'utilisateur" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" value="Email" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" value="Mot de passe" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="Confirmer le mot de passe" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="d-block mt-4 text-center">
                 <x-button class="btn ">
                   je m'inscris
                </x-button>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    Vous avez déja un compte ?
                </a>

               
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