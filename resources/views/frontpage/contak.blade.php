@extends('frontpage.layouts.main')

@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('assets/images/kontak2.png');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-3 bread">Contact Us</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section contact-section">
  <div class="container">
    <div class="row d-flex mb-5 contact-info">
      <div class="col-md-4">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="border w-100 p-4 rounded mb-2 d-flex">
              <div class="icon mr-3">
                <span class="icon-map-o"></span>
              </div>
              <p><span>Alamat:</span>Jl.Tirta Tawar 108, Br.Kutuh Kaja, Ubud, Gianyar, Bali-Indonesia</p>
            </div>
          </div>
          <div class="col-md-12">
            <div class="border w-100 p-4 rounded mb-2 d-flex">
              <div class="icon mr-3">
                <span class="icon-mobile-phone"></span>
              </div>
              <p><span>No.Telpon:</span> <a href="tel://1234567920">+62 87 760 606 090</a></p>
            </div>
          </div>
          <div class="col-md-12">
            <div class="border w-100 p-4 rounded mb-2 d-flex">
              <div class="icon mr-3">
                <span class="icon-envelope-o"></span>
              </div>
              <p><span>Email:</span> <a href="mailto:info@yoursite.com">damarmotorbikerental@gmail.com</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 block-9 mb-md-5">
        <form action="#" class="bg-light p-5 contact-form">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Your Name">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Your Email">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Subject">
          </div>
          <div class="form-group">
            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
          </div>
        </form>
      
      </div>
    </div>
</section>
@endsection