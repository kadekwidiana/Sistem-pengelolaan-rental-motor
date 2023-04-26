@extends('layouts.main')

@section('content')

<div class="mt-3 justify-content-center">
    <form action="{{ route('penyewa.index') }}" method="GET">
      <div class="row">
        <div class="col">
          <div class="input-group mb-3">
            <input type="text" value="" class="form-control" placeholder="Cari data penyewa...." name="search">
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
        <tr>
            <th>No.</th>
            <th>No Paspor</th>
            <th>Nama Penyewa</th>
            <th>Email</th>
            <th>Asal Negara</th>
            <th>Jenis Kelamin</th>
            <th>Alamat Domisili</th>
            <th>No Telepon</th>
            <th>No Sim</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($penyewas as $penyewa)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $penyewa->no_paspor }}</td>
            <td>{{ $penyewa->nama_penyewa }}</td>
            <td>{{ $penyewa->email }}</td>
            <td>{{ $penyewa->asal_negara }}</td>
            <td>{{ $penyewa->jenis_kelamin }}</td>
            <td>{{ $penyewa->domisili }}</td>
            <td>{{ $penyewa->no_telepon }}</td>
            <td>{{ $penyewa->no_sim }}</td>

            <td>
                <form class="d-inline" action="{{ route('penyewa.destroy', $penyewa->no_paspor) }}" method="POST">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger btn-sm mt-1" onclick="return confirm('Hapus data transaksi ini?')">Hapus</button>
                </form>
                {{-- <form action="{{ route('penyewa.destroy', $penyewa->no_paspor) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</button> --}}
            </form>


   </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
