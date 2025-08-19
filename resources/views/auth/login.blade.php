<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" x-data="{ isLoading: false }" @submit="isLoading = true">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-light" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-6">
            <x-input-label for="password" :value="__('Password')" class="text-light" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between mt-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-primary shadow-sm focus:ring-primary" name="remember">
                <span class="ms-2 text-sm text-light">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-light hover:text-primary rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-end mt-8">
            <x-primary-button class="w-full" ::disabled="isLoading" ::class="{ 'opacity-75 cursor-wait': isLoading }">
                <span x-show="!isLoading">
                    {{ __('Log In') }}
                </span>
                <span x-show="isLoading" class="flex items-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Processing...
                </span>
            </x-primary-button>
        </div>
        
        <div class="text-center mt-6">
            <p class="text-sm text-light">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="font-semibold text-primary hover:underline">
                    Daftar di sini
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
