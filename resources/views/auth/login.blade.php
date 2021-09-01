<x-guest-layout>
<section class="login_content">
    <div class="container">          
        <div class="img">
            <img src="{{asset('images\bg.svg')}}">
        </div>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
    <div class="login-content">
        <form method="POST"  action="{{ route('login') }}">
        @csrf
            <img src="{{asset('images\Avila.jpeg')}}">
			<h2 class="title">Bienvenido</h2>
            <x-jet-validation-errors class="mb-4" />
           	<div class="input-div one">
           		<div class="i">
           		   	<i class="fas fa-user"></i>
           		</div>
                <div class="div">
                    <x-jet-input id="email" placeholder="Correo Electronico" class="input" type="email" name="email" :value="old('email')" required autofocus  />
                </div>
            </div>
            <div class="input-div pass">
                <div class="i"> 
                     <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                <x-jet-input id="password" placeholder="Contraseña" class="input" type="password" name="password" required autocomplete="current-password" />
            </div>
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Rcordarme') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Olvidaste la contraseña?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Iniciar') }}
                </x-jet-button>
            </div>
        </form>
        </div>
    </div>
</section>
</x-guest-layout>
