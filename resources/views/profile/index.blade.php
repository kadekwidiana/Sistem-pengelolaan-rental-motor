@extends('layouts.main')

@section('content')
<form action="{{ route('profile.change') }}" method="POST" enctype="multipart/form-data">
    @csrf()
  <div class="mb-3">
    <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
    <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" id="nama_pegawai" name="nama_pegawai" value="{{ old('nama_pegawai', $data->nama_pegawai) }}">
    @error('nama_pegawai')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $data->alamat) }}">
    @error('alamat')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
    <input type="text" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $data->tgl_lahir) }}">
    @error('tgl_lahir')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
    <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin', $data->jenis_kelamin) }}">
    @error('jenis_kelamin')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $data->username) }}">
    @error('username')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" required class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', $data->email) }}">
    @error('email')
    <span class="invalid-feedback">
      {{ $message }}
    </span>
    @enderror
  </div>
  <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-success">Update</button>
  </div>
</form>
<div class="d-flex justify-content-start mb-3">
  <a href="{{ route('change-password') }}" class="btn btn-warning">Ganti Password</a>
</div>
@endsection

