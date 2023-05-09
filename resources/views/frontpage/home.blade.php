@extends('frontpage.layouts.main')

@section('content')
<div class="hero-wrap ftco-degree-bg" style="background-image: url('assets/images/gambae.jpeg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
      <div class="col-lg-8 ftco-animate">
        <div class="text w-100 text-center mb-md-5 pb-md-5">
          <h1 class="mb-4">YAKIN GAK KANGEN STAYCATION DI BALI ?</h1>
          <p style="font-size: 18px;">Sewa murah motor berkualitas</p>
          <a href="https://www.facebook.com/damarmotorbikerental/videos/297482984905205/" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="ion-ios-play"></span>
            </div>
            <div class="heading-title ml-5">
              <span>Yuk Sewa Motor Sekarang</span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section ftco-no-pt bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 heading-section text-center ftco-animate mb-5">
        <span class="subheading">APA YANG KITA TAWARKAN</span>
        <h2 class="mb-2">Kendaraan Unggulan</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="carousel-car owl-carousel">
            @foreach ($motors as $motor)
            <div class="item">
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
                        <a href="/view-motor" class="btn btn-primary py-2 ">
                            Detail
                        </a>
                    </div>
                    
                    </div>
                </div>
              </div>
            @endforeach
          
          
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-about">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/images/gambar9.jpg);">
      </div>
      <div class="col-md-6 wrap-about ftco-animate">
        <div class="heading-section heading-section-white pl-md-5">
          <span class="subheading">About us</span>
          <h2 class="mb-4">Sewa Motor Bali MURAH & MUDAH</h2>

          <p>Sewa motor Bali MURAH dengan unit BERKUALITAS 24 Jam penuh.Rental Kami selalu memastikan kenyamanan bagi pelanggang dengan memberikan beberapa falisitas gratis seperti mengantar kendaraan ke hotel konsumen, memastikan jas hujan tersedia di jok motor, dan gratis bahan bakar.</p>
          <p><a href="" class="btn btn-primary py-3 px-4">Readmore...</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Services</span>
        <h2 class="mb-3">Kenapa Memilih Rental Kami?</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
          <div class="text w-100">
            <h3 class="heading mb-2">Terpercaya & Aman</h3>
            <p>Sebagai salah satu jasa sewa motor berpengalaman di Bali, Kami sudah banyak dipercaya oleh para client dalam hal penyewaan kendaraan motor sesuai dengan apa yang dibutuhkan. Tidak main-main, proses cepat, dan pelayanan yang langsung.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
          <div class="text w-100">
            <h3 class="heading mb-2">Proses Booking Cepat & Mudah</h3>
            <p>Anda bisa menggunakan layanan Telp, Email atau Whatsapp untuk melakukan reservasi rental motor di Bali. Jadi ini bisa menghemat waktu anda mencari sewa motor di Bali.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
          <div class="text w-100">
            <h3 class="heading mb-2">Kendaraan Dalam Kondisi Prima</h3>
            <p>Untuk kondisi kendaraan sendiri kami juga sangat detail mulai dari perawatannya, kebersihannya, hingga mesin-mesinnya. Jadi jangan takut jika kendaraan akan mengalami keluhan selama digunakan.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
          <div class="text w-100">
            <h3 class="heading mb-2">Perawatan Rutin</h3>
            <p>Untuk memberikan kepuasan kepada konsumen.Motor yang kami sewakan selalu di cek dan dilakukan perawatan berkala ke dealer resmi. Sehingga konsumen bisa menggunakan motor dengan nyaman dan aman selama di Bali.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-intro" style="background-image: url(assets/images/nmax4.png);">
  <div class="overlay"></div>
  <div class="container">
    <div class="row justify-content-end">
      <div class="col-md-6 heading-section heading-section-white ftco-animate">
        <h2 class="mb-3">Apakah Anda Ingin Berwisata Di Bali? Yuk Jangan Sampai kelewatan sewa sekarang.</h2>
      </div>
    </div>
  </div>
</section>




<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <span class="subheading">Galeri</span>
        <h2>Damar Motorbike Rental</h2>
      </div>
    </div>
    <div class="row d-flex">
      <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry justify-content-end">
          <a href="blog-single.html" class="block-20" style="background-image: url('assets/images/rental1.jpg');">
          </a>
          <div class="text pt-4">
            <div class="meta mb-3">
          </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry justify-content-end">
          <a href="blog-single.html" class="block-20" style="background-image: url('assets/images/rental2.jpg');">
          </a>
          <div class="text pt-4">
            <div class="meta mb-3">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry justify-content-end">
          <a href="blog-single.html" class="block-20" style="background-image: url('assets/images/rental4.jpg');">
          </a>
          <div class="text pt-4">
            <div class="meta mb-3">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry justify-content-end">
          <a href="blog-single.html" class="block-20" style="background-image: url('assets/images/rental5.jpg');">
          </a>
          <div class="text pt-4">
            <div class="meta mb-3">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry justify-content-end">
          <a href="blog-single.html" class="block-20" style="background-image: url('assets/images/rental6.jpg');">
          </a>
          <div class="text pt-4">
            <div class="meta mb-3">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry">
          <a href="blog-single.html" class="block-20" style="background-image: url('assets/images/rental3.jpg');">
          </a>
          <div class="text pt-4">
            <div class="meta mb-3">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>	
@endsection