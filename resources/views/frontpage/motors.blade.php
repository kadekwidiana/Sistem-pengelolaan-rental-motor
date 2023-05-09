@extends('frontpage.layouts.main')

@section('content')
  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('assets/images/gambar6.webp');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
	  <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
		<div class="col-md-9 ftco-animate pb-5">
		  <h1 class="mb-3 bread">Kami Menyewakan Berbagai Jenis Kendaraan</h1>
		</div>
	  </div>
	</div>
  </section>
	  
<section class="ftco-section bg-light">
	<div class="container">
		<div class="row">

            @foreach ($motors as $motor)
            <div class="col-md-4">
                <div class="car-wrap rounded ftco-animate">
                    <div class="img rounded d-flex align-items-end" style="background-image: url({{ asset('storage/' . $motor->gambar_motor) }});">
                    </div>
                    <div class="text">
                        <h2 class="mb-0"><a href="car-single.html">{{ $motor->nama_motor }} {{ $motor->cc }} cc.</a></h2>
                        <div class="d-flex mb-3">
                            <span class="text-bold">{{ $motor->tipe }}</span>
                            <p class="price ml-auto">Rp {{ number_format($motor->harga_sewa, 0, ',', '.') }} <span>/hari</span></p>
                        </div>
                        <div class="d-flex mb-3">
                            @if ($motor->status == 1)
                                <span class="badge bg-success">Tersedia</span>
                            @else
                                <span class="badge bg-secondary">Disewakan</span>
                            @endif
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <a class="btn btn-primary py-2 " data-bs-toggle="modal" data-bs-target="#{{ $motor->plat_motor }}">
                                Detail
                            </a>
                        </div>
                        
                        </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="{{ $motor->plat_motor }}" tabindex="-1" aria-labelledby="tesLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="tesLabel">Detail Motor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <center><img src="{{ asset('storage/' . $motor->gambar_motor) }}" width="350" alt=""></center>
                          </p>
                        <p><strong>Merek Motor     : </strong>{{ $motor->nama_motor }}</p>
                        <p><strong>CC     : </strong>{{ $motor->cc }} cc</p>
                        <p><strong>Warna     : </strong>{{ $motor->warna }}</p>
                        <p><strong>Tipe     : </strong>{{ $motor->tipe }}</p>
                        <p><strong>Tahun     : </strong>{{ $motor->tahun }}</p>
                        <p><strong>Harga Sewa     : </strong>Rp. {{ number_format($motor->harga_sewa, 0, ',', '.') }}</p>
                        <p><strong>Status    : </strong>
                            @if ($motor->status == 1)
                                <span class="badge bg-success">Tersedia</span>
                            @else
                                <span class="badge bg-secondary">Disewakan</span>
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
			  
			  
	    </div>
	</div>
</section>
@endsection