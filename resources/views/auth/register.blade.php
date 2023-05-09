<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Nama Pegawai --}}
        <div>
            <x-input-label for="nama_pegawai" :value="__('Nama Pegawai')" />
            <x-text-input id="nama_pegawai" class="block mt-1 w-full" type="text" name="nama_pegawai" :value="old('nama_pegawai')" required autofocus autocomplete="nama_pegawai" />
            <x-input-error :messages="$errors->get('nama_pegawai')" class="mt-2" />
        </div>
        {{-- Alamat --}}
        <div>
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autofocus autocomplete="alamat" />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>
        {{-- tgl lahir --}}
        <div>
            <x-input-label for="tgl_lahir" :value="__('Tanggal Lahir')" />
            <x-text-input id="tgl_lahir" class="block mt-1 w-full" type="text" name="tgl_lahir" :value="old('tgl_lahir')" required autofocus autocomplete="tgl_lahir" />
            <x-input-error :messages="$errors->get('tgl_lahir')" class="mt-2" />
        </div>
        {{-- jenis kelamin--}}
        <div>
            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
            <x-text-input id="jenis_kelamin" class="block mt-1 w-full" type="text" name="jenis_kelamin" :value="old('jenis_kelamin')" required autofocus autocomplete="jenis_kelamin" />
            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
