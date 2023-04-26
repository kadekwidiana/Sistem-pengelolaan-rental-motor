@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Detail Motor</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('motors.index') }}"> Kembali</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Plat Motor</th>
                                    <td>{{ $motor->plat_motor }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Motor</th>
                                    <td>{{ $motor->nama_motor }}</td>
                                </tr>
                                <tr>
                                    <th>Warna</th>
                                    <td>{{ $motor->warna }}</td>
                                </tr>
                                <tr>
                                    <th>Tipe</th>
                                    <td>{{ $motor->tipe }}</td>
                                </tr>
                                <tr>
                                    <th>CC</th>
                                    <td>{{ $motor->cc }}</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>{{ $motor->harga_sewa }}</td>
                                </tr>
                                <tr>
                                    <th>Status Motor</th>
                                    <td>{{ $motor->status_motor == 1 ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                                </tr>
                                <tr>
                                    <th>Gambar</th>
                                    <td><img src="{{ asset('images/'.$motor->gambar) }}" width="300"></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pajak</th>
                                    <td>{{ $motor->tgl_pajak }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Pemilik</th>
                                    <td>{{ $motor->nama_pemilik }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Catat</th>
                                    <td>{{ $motor->tgl_catat }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .card {
            margin-top: 20px;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
        }

        table {
            margin-top: 20px;
        }

        th {
            width: 30%;
        }

        td {
            width: 70%;
        }
    </style>
@endpush
