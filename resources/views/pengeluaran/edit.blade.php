@extends('layouts.main')

@section('content')
<div class="align-content-end mb-4">
    <form method="POST" action="{{ route('pengeluaran.update', $pengeluaran->id_pengeluaran) }}">
    @csrf
    @method('PUT')
    <div class="border p-3 rounded">
        <div class="form-group mt-2">
            <label for="plat_motor">Plat Motor</label>
            <select class="form-control @error('plat_motor') is-invalid @enderror" id="plat_motor" name="plat_motor" required>
                <option value="">Pilih plat motor</option>
                @foreach($motors as $motor)
                <option value="{{ $motor->plat_motor }}" @if($pengeluaran->plat_motor == $motor->plat_motor) selected @endif>{{ $motor->nama_motor }} {{ $motor->plat_motor }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="id_pegawai">Operator/Pegawai</label>
            <select name="id_pegawai" id="id_pegawai" class="form-control @error('id_pegawai') is-invalid @enderror">
                    <option value="{{ $pengeluaran->id_pegawai }}">{{ $pengeluaran->pegawai->nama_pegawai }} </option>
            </select>
            @error('id_pegawai')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="tgl_pengeluaran">Tanggal Pengeluaran</label>
            <input type="date" class="form-control @error('tgl_pengeluaran') is-invalid @enderror" id="tgl_pengeluaran" name="tgl_pengeluaran" value="{{ $pengeluaran->tgl_pengeluaran }}" required>
            @error('tgl_pengeluaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> 

        <div class="form-group mt-2">
            <label for="jenis_pengeluaran">Jenis Pengeluaran</label>
            <input class="form-control @error('jenis_pengeluaran') is-invalid @enderror" id="jenis_pengeluaran" name="jenis_pengeluaran" type="text" required value="{{ $pengeluaran->jenis_pengeluaran }}" placeholder="Masukkan Jenis Pengeluaran">
            @error('jenis_pengeluaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>                

        <div class="form-group mt-2">
            <label for="biaya_pengeluaran">Biaya Pengeluaran</label>
            <div class="input-group">
                <span class="input-group-text">Rp.</span>
                <input type="number" class="form-control @error('biaya_pengeluaran') is-invalid @enderror" id="biaya_pengeluaran" name="biaya_pengeluaran" value="{{ $pengeluaran->biaya_pengeluaran }}" placeholder="Masukkan Biaya Pengeluaran" required>
            </div>
            
            @error('biaya_pengeluaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </div>
    </form>
</div>
@endsection