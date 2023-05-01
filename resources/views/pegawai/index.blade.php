@extends('layouts.main')

@section('content')
<div class="d-flex">
    <a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah Transaksi</a>
</div>
<div class="mt-3 justify-content-center">
    <form action="{{ route('pegawai.index') }}" method="GET">
      <div class="row">
        <div class="col">
          <div class="input-group mb-3">
            <input type="text" value="" class="form-control" placeholder="Cari data pegawai...." name="search">
          </div>
        </div>
        <div class="col-1">
        <button class="btn btn-secondary" type="submit">Cari</button>
        </div>
      </div>
    </form>
</div>
<table class="table table-bordered">
    <thead>
      <table class="table table-bordered text-center">
        <tr>
            <th>No.</th>
            <th>Id Pegawai</th>
            <th>Nama Pgawai</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Alamat</th>
            <th>Tanggal lahir</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($pegawais as $pegawai)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $pegawai->id_pegawai }}</td>
            <td>{{ $pegawai->nama_pegawai}}</td>
            <td>{{ $pegawai->email }}</td>
            <td>{{ $pegawai->username }}</td>
            <td>{{$pegawai->password }}</td>
            <td>{{ $pegawai->alamat }}</td>
            <td>{{ $pegawai->tgl_lahir }}</td>
            <td>{{ $pegawai->jenis_kelamin }}</td>

            <td>
                <button type="button" class="btn btn-info btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#{{ $pegawai->id_pegawai }}">
                  Detail
                </button>
                <form class="d-inline" action="" method="POST">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger btn-sm mt-1" onclick="return confirm('Hapus data pegawai ini?')">Hapus</button>
                </form>
              </td>
        </tr>
        @endforeach
    </tbody>
  </table>

@endsection
