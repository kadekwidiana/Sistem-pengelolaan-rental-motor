@extends('layouts.main')

@section('content')
<div class="align-content-end mb-4">
    <a href="{{ route('transaksi.tambah') }}" class="btn btn-outline-secondary"><strong>Data penyewa sudah ada?</strong></a>
</div>

<form method="POST" action="{{ route('transaksi.store') }}">
    @csrf
    {{-- INPUT DATA PENYEWA --}}
   <div class="border p-3 rounded">
        <div class="form-group mt-2">
            <label label for="no_paspor">No Paspor</label>
            <input type="text" class="form-control no_paspor_input @error('no_paspor') is-invalid @enderror" id="no_paspor_input" name="no_paspor" value="{{ old('no_paspor') }}" placeholder="Masukan no paspor" required>
            @error('no_paspor')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="nama_penyewa">Nama Penyewa</label>
            <input type="text" class="form-control @error('nama_penyewa') is-invalid @enderror" id="nama_penyewa" name="nama_penyewa" value="{{ old('nama_penyewa') }}" placeholder="Masukan nama penyewa" required>
            @error('nama_penyewa')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="">Jenis Kelamin</label>
            <div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" @if (old('jenis-kelamin') == 'Laki-laki')
                    checked
                @endif>
                <label class="form-check-label" for="jenis_kelamin">Laki-laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" @if (old('jenis_kelamin') == 'Perempuan')
                    checked
                @endif>
                <label class="form-check-label" for="jenis_kelamin">Perempuan</label>
              </div>
            </div>
            @error('jenis_kelamin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="asal_negara">Asal Negara</label>
            <input type="text" class="form-control @error('asal_negara') is-invalid @enderror" id="asal_negara" name="asal_negara" value="{{ old('asal_negara') }}" placeholder="Masukan asal negara" required>
            @error('asal_negara')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="domisili">Alamat Domisili</label>
            <input type="text" class="form-control @error('domisili') is-invalid @enderror" id="domisili" name="domisili" value="{{ old('domisili') }}" placeholder="Masukan tempat tinggal saat ini" required>
            @error('domisili')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email penyewa" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="no_telepon">No Handphone</label>
                <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}" placeholder="No Telepon" required>
                @error('no_telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group mt-2">
            <label for="no_sim">No Sim</label>
            <input type="text" class="form-control @error('no_sim') is-invalid @enderror" id="no_sim" name="no_sim" value="{{ old('no_sim') }}" placeholder="Masukan Nomor Sim" required>
            @error('no_sim')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    {{-- untuk mengisi no_paspor yang di dapatkan dari no_paspor penyewa --}}
    <div class="form-group mt-2 d-none">
        <label for="no_paspor">No Paspor</label>
        <input type="text" name="no_paspor" id="no_paspor_value" class="form-control no_paspor_value">
        @error('no_paspor')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Input Transaksi --}}
    <div class="border p-3 rounded mt-3">
        <div class="form-group mt-2">
            <label for="kode_transaksi">Kode Transaksi</label>
            <input type="text" class="form-control @error('kode_transaksi') is-invalid @enderror" id="kode_transaksi" name="kode_transaksi" value="{{ old('kode_transaksi') }}" required readonly>
            @error('kode_transaksi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row mt-2">
            <div class="col-md-6">
                <label for="plat_motor">Pilih Motor</label>
                <select name="plat_motor" id="plat_motor" class="form-control @error('plat_motor') is-invalid @enderror">
                        <option value="">--Pilih Motor--</option>
                    @foreach ($motors as $motor)
                        @if ($motor->status == 'tersedia' || $motor->status == 1)
                            <option value="{{ $motor->plat_motor }}" data-harga="{{ $motor->harga_sewa }}" @if (old('plat_motor') == $motor->plat_motor)
                                selected
                            @endif>{{ $motor->nama_motor }}  ( {{ $motor->plat_motor }} )</option>
                        @endif
                    @endforeach
                </select>
                @error('plat_motor')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="col-md-6">
                <label for="harga_sewa">Harga Sewa</label>
                <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" name="harga_sewa" id="harga_sewa" class="form-control" readonly placeholder="Harga sewa motor/hari">
                </div>
            </div>
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
            <label for="periode_pinjam">Periode Pinjam</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input checked" type="radio" name="periode_pinjam" id="inlineRadio1" value="harian" onclick="setTanggal(1)" checked @if (old('perode_pinjam') == 'harian')
                        checked
                    @endif>
                    <label class="form-check-label" for="inlineRadio1">Harian</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="periode_pinjam" id="inlineRadio2" value="mingguan" onclick="setTanggal(7)" @if (old('periode_pinjam') == 'mingguan')
                        checked
                    @endif>
                    <label class="form-check-label" for="inlineRadio2">Mingguan</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="periode_pinjam" id="inlineRadio2" value="bulanan" onclick="setTanggal(30)" @if (old('periode_pinjam') == 'bulanan')
                        checked
                    @endif>
                    <label class="form-check-label" for="inlineRadio2">Bulanan</label>
                </div>
            </div>

        </div>
        {{-- Tanggal sewa --}}
        <div class="row mt-2">
            <div class="col-md-6">
            <label for="tgl_mulai">Tanggal mulai sewa</label>
            <input type="date" class="form-control @error('tgl_mulai') is-invalid @enderror" id="tgl_mulai" name="tgl_mulai" value="{{ date('Y-m-d') }}">
            @error('tgl_mulai')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="col-md-6">
                <label for="tgl_selesai">Tanggal Selesai</label>
                <input type="date" class="form-control @error('tgl_selesai') is-invalid @enderror" id="tgl_selesai" name="tgl_selesai" value="{{ old('tgl_selesai') }}">
                @error('tgl_selesai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Total Harga --}}
        <div class="form-group mt-2">
            <label for="total">Total Harga</label>
            <div class="input-group">
                <span class="input-group-text">Rp.</span>
                <input type="text" class="form-control @error('total') is-invalid @enderror" id="total" name="total" value="{{ old('total') }}" placeholder="Total harga sewa" required>
            </div>
            @error('total')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row mt-2">
            <div class="col-md-6">
            <label for="km_awal">Km Awal</label>
                <input type="number" class="form-control @error('km_awal') is-invalid @enderror" id="km_awal" name="km_awal" value="{{ old('km_awal') }}" placeholder="Kilometer motor awal">
                @error('km_awal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="km_akhir">Km Akhir</label>
                <input type="text" class="form-control @error('km_akhir') is-invalid @enderror" id="km_akhir" name="km_akhir" value="-" readonly>
                @error('km_akhir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group mt-2">
            <label for="jumlah_helm">Jumlah Helm</label>
            <input type="text" class="form-control @error('jumlah_helm') is-invalid @enderror" id="jumlah_helm" name="jumlah_helm" value="{{ old('jumlah_helm') }}" placeholder="Jumlah helm">
            @error('jumlah_helm')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="catatan">Catatan</label>
            <textarea class="form-control" name="catatan" id="catatan" cols="10" rows="5" placeholder="Masukan catatan" required>{{ old('catatan') }}</textarea>
            @error('catatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group mt-2 mb-2">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

<script>
    // MENENTUKAN HARGA SEWA SESUAI DENGAN MOTOR YANG DI PILIH PADA SELECT.
    // let plat_motor = document.getElementById("plat_motor");
    // // tambahkan event listener untuk menangkap perubahan pada pilihan plat_motor
    // plat_motor.addEventListener("change", function() {
    //     // ambil nilai harga_sewa yang terkait dengan pilihan plat_motor yang dipilih
    //     let selected_option = plat_motor.options[plat_motor.selectedIndex];
    //     let harga_sewa = selected_option.getAttribute("data-harga");
    //     // set nilai harga_sewa input menjadi nilai yang terkait dengan pilihan plat_motor yang dipilih
    //     document.getElementById("harga_sewa").value = harga_sewa;
    // });

    // NO PASPOR OTOMATIS PADA TRANSAKSI, SESUAI DENGAN NO PASPOR PENYEWA.
    let noPaspor = document.getElementById('no_paspor_input');
    noPaspor.addEventListener('input', function(){
        let noPasporValue = this.value;
        let no_paspor_autofill = document.getElementById('no_paspor_value');
        no_paspor_autofill.value = noPasporValue;
    });

    // KODE TRANSAKSI OTOMATIS
    window.onload = function(){
        let today = new Date();
        let year = today.getFullYear().toString();
        let month = (today.getMonth() + 1).toString().padStart(2, '0');
        let day = today.getDate().toString().padStart(2, '0');
        let createKe = localStorage.getItem('create_ke') || 1;
        localStorage.setItem('create_ke', ++createKe);
        let kodeTransaksi = 'RTL' + month + day + createKe.toString().padStart(3, '0');
        document.getElementById('kode_transaksi').value = kodeTransaksi;
    }

    // HITUNG TOTAL HARGA BERDASARKAN TANGGAL MULAI&SELESAI DI PILIH.
    function hitungTotalHarga() {
    // ambil tgl mulai dan selesai
    let tglMulai = new Date(document.getElementById('tgl_mulai').value);
    let tglSelesai = new Date(document.getElementById('tgl_selesai').value);
    // hitung selisih hari antara tanggal mulai dan selesai
    let selisihHari = (tglSelesai - tglMulai) / (1000 * 60 * 60 * 24);
    // ambil harga perhari
    let hargaPerHari = document.getElementById('harga_sewa').value; // <-- tambahkan .value
    // hitung total harga
    let totalHarga = selisihHari * hargaPerHari;
    // set nilai total harga
    document.getElementById('total').value = totalHarga;
}
    // panggil fungsi tgl_mulai & tgl_selesai
    document.getElementById('tgl_mulai').addEventListener('change', hitungTotalHarga);
    document.getElementById('tgl_selesai').addEventListener('change', hitungTotalHarga);

    // SET RADIO BUTTON YANG DI PILIH, TANGGAL DIBUAT OTOMATIS, TOTAL HARGA TOTAL DI BUAT OTOMATIS
    function setTanggal(period) {
        let tgl_mulai = document.getElementById("tgl_mulai").value;
        let tgl_selesai = new Date(tgl_mulai);
        tgl_selesai.setDate(tgl_selesai.getDate() + period);
        document.getElementById("tgl_selesai").value = tgl_selesai.toISOString().slice(0, 10);
        // hitung harga sewa berdasarkan periode sewa
        let harga_sewa = document.getElementById("harga_sewa").value;
        let total_harga = 0;
        if (period === 1) {
            // periode harian
            total_harga = harga_sewa;
        } else if (period === 7) {
            // periode mingguan
            total_harga = harga_sewa * 7;
        } else if (period === 30) {
            // periode bulanan
            total_harga = harga_sewa * 30;
        }
        document.getElementById("total").value = total_harga;
    }

</script>
@endsection
