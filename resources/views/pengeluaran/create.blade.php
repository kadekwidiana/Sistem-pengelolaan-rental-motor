@extends('layouts.main')

@section('content')
    <div class="align-content-end mb-4">
        <form method="POST" action="{{ route('pengeluaran.store') }}">
            @csrf
            <div class="border p-3 rounded">
                <div class="form-group mt-2">
                    <label for="plat_motor">Plat Motor</label>
                    {{-- <input type="text" class="form-control plat_motor @error('plat_motor') is-invalid @enderror" id="plat_motor" name="plat_motor" value="{{ old('plat_motor') }}" placeholder="Masukkan Plat Motor" required>
                    @error('plat_motor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror --}}
                    <select class="form-control @error('plat_motor') is-invalid @enderror" id="plat_motor" name="plat_motor" required>
                        <option value="">Pilih plat motor</option>
                        @foreach($motors as $motor)
                            <option value="{{ $motor->plat_motor }}">{{ $motor->nama_motor }}  {{ $motor->plat_motor }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="id_pegawai">Operator/Pegawai</label>
                    <select name="id_pegawai" id="id_pegawai" class="form-control @error('id_pegawai') is-invalid @enderror">
                            <option value="{{ Auth::user()->id }}">@if (Auth::check())
                                {{ Auth::user()->nama_pegawai }}
                            @endif</option>
                    </select>
                    @error('id_pegawai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                

                <div class="form-group mt-2">
                    <label for="tgl_pengeluaran">Tanggal Pengeluaran</label>
                    <input type="date" class="form-control @error('tgl_pengeluaran') is-invalid @enderror" id="tgl_pengeluaran" name="tgl_pengeluaran" value="{{ old('tgl_pengeluaran') }}" required>
                    @error('tgl_pengeluaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> 
                <div class="form-group mt-2">
                    <label for="jenis_pengeluaran">Jenis Pengeluaran</label>
                    <input class="form-control @error('jenis_pengeluaran') is-invalid @enderror" id="jenis_pengeluaran" name="jenis_pengeluaran" type="text" required value="{{ old('jenis_pengeluaran') }}" placeholder="Masukkan Jenis Pengeluaran" required>
                    @error('jenis_pengeluaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>                

                <div class="form-group mt-2">
                    <label for="biaya_pengeluaran">Biaya Pengeluaran</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control @error('biaya_pengeluaran') is-invalid @enderror" id="biaya_pengeluaran" name="biaya_pengeluaran" value="{{ old('biaya_pengeluaran') }}" placeholder="Masukkan Biaya Pengeluaran" required>
                    </div>
                    @error('biaya_pengeluaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> 

                <button type="submit" class="btn btn-primary mt-3">Tambah</button>
            </>
        </form>
    </div>
@endsection