@extends('layouts.main')

@section('content')
<div class="align-content-end mb-4">
        <form method="POST" action="{{ route('motors.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="border p-3 rounded">
                <div class="form-group mt-2">
                    <label label for="plat_motor">Plat Motor</label>
                    <input type="text" class="form-control plat_motor @error('plat_motor') is-invalid @enderror" id="plat_motor" name="plat_motor" value="{{ old('plat_motor') }}" placeholder="Masukan Plat Motor" required>
                    @error('plat_motor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>                           

                            <div class="form-group">
                                <label for="nama_motor">{{ __('Nama Motor') }}</label>
                                    <input id="nama_motor" type="text" class="form-control @error('nama_motor') is-invalid @enderror" name="nama_motor" value="{{ old('nama_motor') }}" placeholder="Masukan Nama Motor" autofocus>

                                    @error('nama_motor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="">Pilih Warna</label>
                                    <div>
                                    <div class="form-check form-check-inline">
                                        <input id="warna_merah" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="merah" {{ old('warna') == 'merah' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="warna_merah">{{ __('Merah') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="warna_biru" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="biru" {{ old('warna') == 'biru' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="warna_biru">{{ __('Biru') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="warna_hijau" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="hijau" {{ old('warna') == 'hijau' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="warna_hijau">{{ __('Hijau') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="warna_kuning" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="kuning" {{ old('warna') == 'kuning' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="warna_kuning">{{ __('Kuning') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="warna_merah" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="hitam" {{ old('warna') == 'hitam' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="warna_hitam">{{ __('Hitam') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="warna_merah" type="radio" class="form-check-input @error('warna') is-invalid @enderror" name="warna" value="putih" {{ old('warna') == 'putih' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="warna_putih">{{ __('Putih') }}</label>
                                    </div>
                                </div>
                                    @error('warna')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="tipe">{{ __('Tipe') }}</label>
                                <select id="tipe" class="form-control @error('tipe') is-invalid @enderror" name="tipe" required autocomplete="tipe" autofocus>
                                    <option value="">Pilih tipe</option>
                                    <option value="yamaha" {{ old('tipe') == 'yamaha' ? 'selected' : '' }}>Yamaha</option>
                                    <option value="honda" {{ old('tipe') == 'honda' ? 'selected' : '' }}>Honda</option>
                                    <option value="suzuki" {{ old('tipe') == 'suzuki' ? 'selected' : '' }}>Suzuki</option>
                                </select>
                            
                                @error('tipe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="tahun">{{ __('Tahun') }}</label>
                                    <input id="tahun" type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') }}" placeholder="Masukan Tahun" autofocus>

                                    @error('tahun')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label for="tgl_pajak">{{ __('Tanggal Pajak') }}</label>
                                <input id="tgl_pajak" type="date" class="form-control @error('tgl_pajak') is-invalid @enderror" name="tgl_pajak" value="{{ old('tgl_pajak') }}" rplaceholder="Masukan Tanggal Pajak" autofocus>

                                @error('tgl_pajak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama_pemilik">{{ __('Nama Pemilik') }}</label>
                                <input id="nama_pemilik" type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" name="nama_pemilik" value="{{ old('nama_pemilik') }}" placeholder="Masukan Nama Pemilik" autofocus>

                                @error('nama_pemilik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="cc">{{ __('CC') }}</label>
                                <input id="cc" type="text" class="form-control @error('cc') is-invalid @enderror" name="cc" value="{{ old('cc') }}" placeholder="Masukan CC" autofocus>

                                @error('cc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label for="harga_sewa">{{ __('Harga Sewa') }}</label>
                                <input id="harga_sewa" type="text" class="form-control @error('harga_sewa') is-invalid @enderror" name="harga_sewa" value="{{ old('harga_sewa') }}" placeholder="Masukan Harga Sewa" autofocus>

                                @error('harga_sewa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">{{ __('Status') }}</label>
                                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" required>
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>{{ __('Available') }}</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>{{ __('Not Available') }}</option>
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>

                        <div class="form-group">
                            <label for="gambar_motor">{{ __('Gambar Motor') }}</label>
                                <input id="gambar_motor" type="file" class="form-control-file @error('gambar_motor') is-invalid @enderror" name="gambar_motor" required>

                                @error('gambar_motor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tgl_catat">{{ __('Tanggal Catat') }}</label>
                                <input id="tgl_catat" type="date" class="form-control @error('tgl_catat') is-invalid @enderror" name="tgl_catat" value="{{ old('tgl_catat') ?: date('Y-m-d') }}" required autocomplete="tgl_catat" autofocus>
                            
                                @error('tgl_catat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah') }}
                                </button>
                                <a href="{{ route('motors.index') }}" class="btn btn-danger">
                                    {{ __('Batal') }}
                                </a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




