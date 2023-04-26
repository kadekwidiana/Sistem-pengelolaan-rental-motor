@extends('layouts.main')

@section('content')
    <div class="container">
        {{-- <h1>Daftar Motor</h1> --}}
        <a href="{{ route('motors.create') }}" class="btn btn-primary mb-3">Tambah Motor</a>
        <table class="table">
        </div>   
            <div class="mt-3 justify-content-center">
                <form action="{{ route('motors.index') }}" method="GET">
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
                    <th>No.</th>
                    <th>Plat Motor</th>
                    <th>Nama Motor</th>
                    <th>Warna</th>
                    <th>Tipe</th>
                    <th>Tahun</th>
                    <th>Tanggal Pajak</th>
                    <th>Nama Pemilik</th>
                    <th>CC</th>
                    <th>Harga Sewa</th>
                    <th>Status</th>
                    <th>Gambar Motor</th>
                    <th>Tanggal Catat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
            $no = 1;
        @endphp
                @foreach ($motors as $motor)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $motor->plat_motor }}</td>
                        <td>{{ $motor->nama_motor }}</td>
                        <td>{{ $motor->warna }}</td>
                        <td>{{ $motor->tipe }}</td>
                        <td>{{ $motor->tahun }}</td>
                        <td>{{ $motor->tgl_pajak }}</td>
                        <td>{{ $motor->nama_pemilik }}</td>
                        <td>{{ $motor->cc }}</td>
                        <td>{{ $motor->harga_sewa }}</td>
                        <td>
                            @if ($motor->status == 1)
                                <span class="badge bg-success">Tersedia</span>
                            @else
                                <span class="badge bg-secondary">Disewakan</span>
                            @endif
                        </td>
                        <td><img src="{{ Storage::url($motor->gambar_motor) }}" alt="{{ $motor->nama_motor }}" class="img-fluid"></td>
                        <td>{{ $motor->tgl_catat }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <a class="btn btn-sm btn-info me-2" data-bs-toggle="modal" data-bs-target="#{{ $motor->plat_motor }}">
                                    Detail
                                </a>
                                
                                <a href="{{ route('motors.edit', $motor->plat_motor) }}" class="btn btn-sm btn-success me-2" title="Edit">
                                    Edit
                                </a>
                                <form action="{{ route('motors.destroy', $motor->plat_motor) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus motor ini?')" title="Hapus">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                              
                        </td>
                    </tr>
                    {{-- modal detail --}}
                    <div class="modal fade" id="{{ $motor->plat_motor }}" tabindex="-1" aria-labelledby="{{ $motor->plat_motor }}Label" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Motor</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <img src="{{ Storage::url($motor->gambar_motor) }}" alt="{{ $motor->nama_motor }}" class="img-fluid">
                                <p><strong>Plat Motor: </strong>{{ $motor->plat_motor }}</p>
                              <p><strong>Nama Motor: </strong>{{ $motor->nama_motor }}</p>
                              <p><strong>Warna: </strong>{{ $motor->warna }}</p>
                              <p><strong>Tipe: </strong>{{ $motor->tipe }}</p>
                              <p><strong>Tahun: </strong>{{ $motor->tahun }}</p>
                              <p><strong>Tanggal Pajak: </strong>{{ $motor->tgl_pajak }}</p>
                              <p><strong>Nama Pemilik: </strong>{{ $motor->nama_pemilik }}</p>
                              <p><strong>CC: </strong>{{ $motor->cc }}</p>
                              <p><strong>Harga Sewa: </strong>{{ $motor->harga_sewa }}</p>
                              <p><strong>Status: </strong>{{ $motor->status }}</p>
                    <p><strong>Tanggal Catat: </strong>{{ $motor->tgl_catat }}</p>
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
    </div>
@endsection