@extends('layouts.main')

@section('content')
<div class="d-flex">
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>
</div>
<div class="mt-3 justify-content-center">
    <form action="{{ route('transaksi.index') }}" method="GET">
      <div class="row">
        <div class="col">
          <div class="input-group mb-3">
            <input type="text" value="" class="form-control" placeholder="Cari data transaksi...." name="search">
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
            <th>Kode Transaksi</th>
            <th>Plat Motor</th>
            <th>Nama Penyewa</th>
            <th>Pegawai</th>
            <th>Tgl Mulai</th>
            <th>Tgl Selesai</th>
            <th>Total</th>
            <th>KM Awal</th>
            <th>KM Akhir</th>
            <th>Catatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksis as $transaksi)
        <tr>
            <td>{{ $transaksi->kode_transaksi }}</td>
            <td>{{ $transaksi->plat_motor }}</td>
            <td>{{ $transaksi->penyewa->nama_penyewa }}</td>
            <td>{{ $transaksi->pegawai->nama_pegawai }}</td>
            <td>{{ $transaksi->tgl_mulai }}</td>
            <td>{{ $transaksi->tgl_selesai }}</td>
            <td>{{ $transaksi->total }}</td>
            <td>{{ $transaksi->km_awal }}</td>
            <td>{{ $transaksi->km_akhir }}</td>
            <td>{{ $transaksi->catatan }}</td>
            {{-- <td>
                <form action="{{ route('transaksi.destroy', $transaksi->kode_transaksi) }}" method="POST">
                    <a href="{{ route('transaksi.edit', $transaksi->kode_transaksi) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('transaksi.pengembalian', $transaksi->kode_transaksi) }}" class="btn btn-success btn-sm">Kembali</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td> --}}
            <td>
                <a href="{{ route('transaksi.pengembalian', $transaksi->kode_transaksi) }}" class="btn btn-warning btn-sm mt-1">Pengembalian</a>
                <a href="{{ route('transaksi.edit', $transaksi->kode_transaksi) }}" class="btn btn-success btn-sm mt-1">Edit</a>
                <button type="button" class="btn btn-info btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#detail{{ $transaksi->kode_transaksi }}">
                  Detail
                </button>
                <form class="d-inline" action="{{ route('transaksi.destroy', $transaksi->kode_transaksi) }}" method="POST">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger btn-sm mt-1" onclick="return confirm('Hapus data transaksi ini?')">Hapus</button>
                </form>
              </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection