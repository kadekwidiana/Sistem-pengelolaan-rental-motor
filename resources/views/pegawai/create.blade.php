@extends('layouts.main')

@section('content')
<div class="align-content-end mb-4">
    <form method="POST" action="{{ route('pegawai.store') }}">
        @csrf
        <div class="border p-3 rounded">
            <div class="form-group mt-2">
                <label label for="id_pegawai">{{ __('Id Pegawai') }}</label>
                <input type="text" class="form-control id_pegawai @error('id_pegawai') is-invalid @enderror" id="id_pegawai" name="id_pegawai" value="{{ old('id_pegawai') }}" placeholder="Masukan Id Pegawai" required>
                @error('id_pegawai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_pegawai">{{ __('Nama Pegawai') }}</label>
                <input id="nama_pegawai" type="text" class="form-control @error('nama_pagawai') is-invalid @enderror" name="nama_pegawai" value="{{ old('nama_pegawai') }}" placeholder="Masukan Nama Pegawai" autofocus >

                @error('nama_pegawai')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukan Email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group">
            <label for="username">{{ __('username') }}</label>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Masukan Usernmae" autofocus>

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                </div>
            <div class="form-group">
                <label for="alamat">{{ __('Alamat') }}</label>
                    <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" placeholder="Masukan Alamat" autofocus>

                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group">
                <label for="tgl_lahir">{{ __('Tanggal Lahir') }}</label>
                    <input id="tgl_lahir" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ old('tgl_lahir') }}" rplaceholder="Masukan Tanggal Lahir" autofocus>

                    @error('tgl_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group mt-2">
                <label for="">Pilih Jenis Kelamin</label>
                    <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="L">
                        <label class="form-check-label" for="laki-laki">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P">
                        <label class="form-check-label" for="perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>
                    @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    {{ __('Tambah') }}
                </button>
                <a href="{{ route('pegawai.index') }}" class="btn btn-danger">
                    {{ __('Batal') }}
                </a>
            </div>
    </form>
    </div>
</div>
@endsection


