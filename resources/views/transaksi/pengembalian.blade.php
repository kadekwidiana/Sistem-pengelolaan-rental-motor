@extends('layouts.main')

@section('content')
<div class="col-md-10">
    <div class="card">
        <form method="POST" action="{{ route('transaksi.pengembalian', $transaksi->kode_transaksi) }}">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="kode_transaksi">Kode Transaksi</label>
                <input type="text" class="form-control @error('kode_transaksi') is-invalid @enderror" id="kode_transaksi" name="kode_transaksi" value="{{ $transaksi->kode_transaksi }}" required readonly>
                @error('kode_transaksi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_paspor">Nama Penyewa</label>
                <select name="no_paspor" id="no_paspor" class="form-control @error('no_paspor') is-invalid @enderror">
                    @foreach ($penyewas as $penyewa)
                        <option value="{{ $penyewa->no_paspor }}" {{ $transaksi->no_paspor == $penyewa->no_paspor ? 'selected' : '' }}>{{ $penyewa->nama_penyewa }}</option>
                    @endforeach
                </select>
                @error('no_paspor')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="plat_motor">Pilih Motor</label>
                <select name="plat_motor" id="plat_motor" class="form-control @error('plat_motor') is-invalid @enderror">
                        <option value="">--Pilih Motor--</option>
                    @foreach ($motors as $motor)
                        @if ($motor->status == 'tidak tersedia' || $motor->status == 0)
                            <option value="{{ $motor->plat_motor }}" data-harga="{{ $motor->harga_sewa }}" {{ $transaksi->plat_motor == $motor->plat_motor ? 'selected' : '' }}>{{ $motor->nama_motor }}</option>
                        @endif
                    @endforeach
                </select>
                @error('plat_motor')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror 
            </div>
            <div class="form-group">
                <label for="harga_sewa">Harga Sewa</label>
                <input type="text" name="harga_sewa" id="harga_sewa" class="form-control" readonly value="{{ $transaksi->motor->harga_sewa }}">
            </div>
            <div class="form-group">
                <label for="id_pegawai">Operator/Pegawai</label>
                <select name="id_pegawai" id="id_pegawai" class="form-control @error('id_pegawai') is-invalid @enderror">
                    @foreach ($pegawais as $pegawai)
                        <option value="{{ $pegawai->id_pegawai }}" {{ $transaksi->id_pegawai == $pegawai->id_pagawai ? 'selected' : '' }}>{{ $pegawai->nama_pegawai }} ({{ $pegawai->id_pegawai }})</option>
                    @endforeach
                </select>
                @error('id_pegawai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Tanggal sewa --}}
            <div class="form-group">
                <label for="tgl_mulai">Tanggal mulai sewa</label>
                <input type="date" class="form-control @error('tgl_mulai') is-invalid @enderror" id="tgl_mulai" name="tgl_mulai" value="{{ $transaksi->tgl_mulai }}">
                @error('tgl_mulai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tgl_selesai">Tanggal Selesai</label>
                <input type="date" class="form-control @error('tgl_selesai') is-invalid @enderror" id="tgl_selesai" name="tgl_selesai" value="{{ $transaksi->tgl_selesai }}">
                @error('tgl_selesai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Total Harga --}}
            <div class="form-group">
                <label for="total">Total Harga</label>
                <input type="number" class="form-control @error('total') is-invalid @enderror" id="total" name="total" value="{{ $transaksi->total }}">
                @error('total')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="km_awal">Km Awal</label>
                <input type="number" class="form-control @error('km_awal') is-invalid @enderror" id="km_awal" name="km_awal" value="{{ $transaksi->km_awal }}" readonly>
                @error('km_awal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="km_akhir">Km Akhir</label>
                <input type="number" class="form-control @error('km_akhir') is-invalid @enderror" id="km_akhir" name="km_akhir">
                @error('km_akhir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea class="form-control" name="catatan" id="catatan" cols="10" rows="5">{{ $transaksi->catatan }}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
    <script>
        // tangkap pilihan plat_motor yang dipilih
        var plat_motor = document.getElementById("plat_motor");
        
        // tambahkan event listener untuk menangkap perubahan pada pilihan plat_motor
        plat_motor.addEventListener("change", function() {
            // ambil nilai harga_sewa yang terkait dengan pilihan plat_motor yang dipilih
            var selected_option = plat_motor.options[plat_motor.selectedIndex];
            var harga_sewa = selected_option.getAttribute("data-harga");
            
            // set nilai harga_sewa input menjadi nilai yang terkait dengan pilihan plat_motor yang dipilih
            document.getElementById("harga_sewa").value = harga_sewa;
        });

        // fungsi menghitung total harga
        function hitungTotalHarga() {
            // ambil tgl mulai dan selesai
            let tglMulai = new Date(document.getElementById('tgl_mulai').value);
            let tglSelesai = new Date(document.getElementById('tgl_selesai').value);

            // hitung selisih hari antara tanggal mulai dan selesai
            let selisihHari = (tglSelesai - tglMulai) / (1000 * 60 * 60 * 24);

            // ambil harga perhari
            let hargaPerHari = document.getElementById('harga_sewa').value;

            // hitung total harga
            let totalHarga = selisihHari * hargaPerHari;

            // berikan diskon jika sewa 1 minggu atau 1 bulan
            if(selisihHari >= 7 && selisihHari < 30){
                let diskon = 0.1 * totalHarga;
                totalHarga -= diskon;
            }else if(selisihHari >= 30){
                let diskon = 0.15 * totalHarga;
                totalHarga -= diskon;
            }

            // set nilai total harga
            document.getElementById('total').value = totalHarga;
        }

        // panggil fungsi
        document.getElementById('tgl_mulai').addEventListener('change', hitungTotalHarga);
        document.getElementById('tgl_selesai').addEventListener('change', hitungTotalHarga);
    </script>
@endsection