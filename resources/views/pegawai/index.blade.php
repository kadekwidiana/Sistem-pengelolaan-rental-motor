@extends('layouts.main')

@section('content')
<div class="d-flex">
  <a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah Pegawai</a>
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
        <tr>
            <th>No.</th>
            <th>Nama Pegawai</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Posisi</th>
            <th>Status</th>
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
            <td>{{ $pegawai->nama_pegawai}}</td>
            <td>{{ $pegawai->email }}</td>
            <td>{{ $pegawai->alamat }}</td>
            <td>{{ $pegawai->jenis_kelamin }}</td>
            <td>
              @if ($pegawai->is_admin == 3)
                  <span>Owner/Pemilik</span>
              @elseif($pegawai->is_admin == 2)
                  <span>Manajer</span>
              @else
                <span>Operator</span>
              @endif
          </td>
            <td>
              @if ($pegawai->status == 1)
                <span class="badge bg-success">Aktif</span>
              @else
                <span class="badge bg-danger">Tidak Aktif</span>
              @endif
            </td>

            <td>
              <button type="button" class="btn btn-info btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#{{ $pegawai->username }}">
                  Detail
                </button>
                @if ($pegawai->is_admin !== 3)
                  <form class="d-inline" action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm mt-1" onclick="return confirm('Hapus data pegawai ini?')">Hapus</button>
                </form>
                @endif
                
                @can('owner') 
                  @if ($pegawai->status === 0)
                  <form class="d-inline" action="{{ route('pegawai.statusPegawai', $pegawai->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-primary btn-sm mt-1" onclick="return confirm('Perbarui status')">Aktifkan</button>
                  </form>
                  @elseif($pegawai->is_admin === 3)
                  
                  @else
                  <form class="d-inline" action="{{ route('pegawai.statusNonAktif', $pegawai->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-secondary btn-sm mt-1" onclick="return confirm('Non Aktifkan Pegawai Ini?')">Non Aktifkan</button>
                  </form>
                  @endif
                @endcan
            </td>
        </tr>

        <div class="modal fade" id="{{ $pegawai->username }}" tabindex="-1" aria-labelledby="{{ $pegawai->username }}Label" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p><strong>Nama Pegawai : </strong>{{ $pegawai->nama_pegawai }}</p>
                <p><strong>Alamat : </strong>{{ $pegawai->alamat }}</p>
                <p><strong>Tanggal Lahir : </strong>{{ date('d F Y', strtotime($pegawai->tgl_lahir)) }}</p>
                <p><strong>Jenis Kelamin : </strong>{{ $pegawai->jenis_kelamin }}</p>
                <p><strong>Username : </strong>{{ $pegawai->username }}</p>
                <p><strong>Email : </strong>{{ $pegawai->email }}</p>
                <p><strong>Posisi : </strong>
                  @if ($pegawai->is_admin == 3)
                    <span>Owner/Pemilik</span>
                  @elseif($pegawai->is_admin == 2)
                    <span>Manajer</span>
                  @else
                    <span>Operator</span>
                  @endif
                </p>
                <p><strong>Status : </strong>
                  @if ($pegawai->status == 1)
                    <span class="badge bg-success">Aktif</span>
                  @else
                    <span class="badge bg-danger">Tidak Aktif</span>
                  @endif
                </p>
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

@endsection
