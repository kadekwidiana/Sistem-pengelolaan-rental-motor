@extends('layouts.main')

@section('content')
    <div class="container">
        {{-- <h1>Daftar Motor</h1> --}}
        <a href="{{ route('pengeluaran.create') }}" class="btn btn-primary mb-3">Tambah Pengeluaran</a>
        <table class="table">
        </div>   
            <div class="mt-3 justify-content-center">
                <form action="{{ route('pengeluaran.index') }}" method="GET">
                  <div class="row">
                    <div class="col">
                      <div class="input-group mb-3">
                        <input type="text" value="" class="form-control" placeholder="Cari data Motor...." name="search">
                      </div>
                    </div>
                    <div class="col-1">
                    <button class="btn btn-secondary" type="submit">Cari</button>
                    </div>
                  </div>
                </form>
              </div>
            <thead>
                <table class="table table-bordered text-center">
                <tr>
            <th>ID Pengeluaran</th>
            <th>Motor</th>
            <th>ID Pegawai</th>
            <th>Tanggal Pengeluaran</th>
            <th>Jenis Pengeluaran</th>
            <th>Biaya Pengeluaran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengeluarans as $pengeluaran)
            <tr>
                <td>{{ $pengeluaran->id_pengeluaran }}</td>
                <td>{{ $pengeluaran->plat_motor }}</td>
                <td>{{ $pengeluaran->id_pegawai }}</td>
                <td>{{ date('d F Y', strtotime($pengeluaran->tgl_pengeluaran)) }}</td>
                <td>{{ $pengeluaran->jenis_pengeluaran }}</td>
                <td>{{ number_format($pengeluaran->biaya_pengeluaran, 0, ',', '.') }}</td>
                <td>
                  <div class="d-flex justify-content-center align-items-center">
                    <a class="btn btn-sm btn-info me-2" data-bs-toggle="modal" data-bs-target="#{{ $pengeluaran->id_pengeluaran }}">
                        Detail
                    </a>
                  <a href="{{ route('pengeluaran.edit', $pengeluaran->id_pengeluaran) }}" class="btn btn-sm btn-success me-2" title="Edit">
                    Edit
                </a>
                <form action="{{ route('pengeluaran.destroy', $pengeluaran->id_pengeluaran) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus motor ini?')" title="Hapus">
                        Hapus
                    </button>
                </form>
                </td>
            </tr>
            <div class="modal fade" id="{{ $pengeluaran->id_pengeluaran }}" tabindex="-1" aria-labelledby="{{ $pengeluaran->id_pengeluaran }}Label" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pengeluaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p><strong>Id Pengeluaran : </strong>{{ $pengeluaran->id_pengeluaran }}</p>
                    <p><strong>Plat Motor : </strong>{{ $pengeluaran->plat_motor }}</p>
                    <p><strong>Tanggal Pengeluaran : </strong>{{ date('d F Y', strtotime($pengeluaran->tgl_pengeluaran)) }}</p>
                    <p><strong>Jenis Pengeluaran : </strong>{{ $pengeluaran->jenis_pengeluaran }}</p>
                    <p><strong>Biaya Pengeluaran : </strong>Rp. {{ number_format($pengeluaran->biaya_pengeluaran, 0, ',', '.') }}</p>
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
<p><strong>Total Pengeluaran : </strong>Rp. {{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
</div>
@endsection