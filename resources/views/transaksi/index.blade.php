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
            <th>No.</th>
            <th>Kode Transaksi</th>
            <th>Motor</th>
            <th>Nama Penyewa</th>
            <th>Tgl Mulai</th>
            <th>Tgl Selesai</th>
            <th>Total Harga</th>
            <th>KM Awal</th>
            <th>KM Akhir</th>
            <th>Jumlah helm</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($transaksis as $transaksi)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $transaksi->kode_transaksi }}</td>
            <td>{{ $transaksi->motor->nama_motor }} {{ $transaksi->plat_motor }}</td>
            <td>{{ $transaksi->penyewa->nama_penyewa }}</td>
            <td>{{ date('d F Y', strtotime($transaksi->tgl_mulai)) }}</td>
            <td>{{ date('d F Y', strtotime($transaksi->tgl_selesai)) }}</td>
            <td>{{ number_format($transaksi->total, 0, ',', '.') }}</td>
            <td>{{ number_format($transaksi->km_awal, 0, ',', '.') }}</td>
            <td>{{ $transaksi->km_akhir }}</td>
            <td>{{ $transaksi->jumlah_helm }}</td>

            <td>
                <a href="{{ route('transaksi.pengembalian', $transaksi->kode_transaksi) }}" class="btn btn-warning btn-sm mt-1">Pengembalian</a>
                <a href="{{ route('transaksi.edit', $transaksi->kode_transaksi) }}" class="btn btn-success btn-sm mt-1">Edit</a>
                <button type="button" class="btn btn-info btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#{{ $transaksi->kode_transaksi }}">
                  Detail
                </button>
                <form class="d-inline" action="{{ route('transaksi.destroy', $transaksi->kode_transaksi) }}" method="POST">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger btn-sm mt-1" onclick="return confirm('Hapus data transaksi ini?')">Hapus</button>
                </form>
              </td>
        </tr>
          <!-- Modal Detail Transaksi -->
        <div class="modal fade" id="{{ $transaksi->kode_transaksi }}" tabindex="-1" aria-labelledby="{{ $transaksi->kode_transaksi }}Label" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title fw-bold" id="exampleModalLabel">Detail Transaksi</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p><strong>Kode Transaksi     : </strong>{{ $transaksi->kode_transaksi }}</p>
                <p><strong>Nama Penyewa       : </strong>{{ $transaksi->penyewa->nama_penyewa }} ( {{ $transaksi->no_paspor }} )</p>
                <p><strong>Motor yang di sewa : </strong>{{ $transaksi->motor->nama_motor }} {{ $transaksi->plat_motor }}</p>
                <p><strong>Operator/Pegawai   : </strong>{{ $transaksi->user->nama_pegawai }} </p>
                <p><strong>Tanggal mulai      : </strong>{{ $transaksi->tgl_mulai }}</p>
                <p><strong>Tanggal selesai    : </strong>{{ $transaksi->tgl_selesai }}</p>
                <p><strong>Total harga sewa   : </strong>Rp.{{ number_format($transaksi->total, 0, ',', '.') }} km.</p>
                <p><strong>Kilometer Awal     : </strong>{{ number_format($transaksi->km_awal, 0, ',', '.') }} km.</p>
                <p><strong>Kilometer Akhir    : </strong>{{ $transaksi->km_akhir }}</p>
                <p><strong>Catatan            : </strong>{{ $transaksi->catatan }}</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </tbody>
  </table>
  <p><strong>Total Transaksi : </strong>Rp. {{ number_format($totalTransaksi, 0, ',', '.') }}</p>
  @empty($transaksi)
    <div class="text-center" style="font-weight: bold">
      <h5 style="font-weight: bold">Data Transaksi belum ada</h5>
      <a href="{{ route('transaksi.create') }}" class="">Buat Transaksi ?</a>
    </div>
  @endempty
  <!-- Button trigger modal -->

@endsection
