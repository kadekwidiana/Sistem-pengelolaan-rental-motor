<x-guest-layout>
    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

    <div class="row justify-content-center align-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4 fw-bold">LOGIN</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-3">
                            <x-input-label for="password" class="form-label" :value="__('Email')" />
                            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Masukan Email"/>
                            
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input class="@error('password') is-invalid @enderror" id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required placeholder="Password"/>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                            
                        </div>

                        <div class="d-grid gap-2 col-6 mx-auto mt-3 mb-3">
                            <x-primary-button class="ml-3">
                                {{ __('Login') }}
                            </x-primary-button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
