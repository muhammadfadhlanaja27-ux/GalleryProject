@extends('layouts.app')

@section('title', 'About')
@section('body_class', 'about-page')

@section('content')
  <div id="faulty-terminal-background" style="position: fixed; inset: 0; z-index: 0;"></div>

  <div style="position: relative; z-index: 1;">

    <div class="page-title" data-aos="fade" style="background: transparent;">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 style="color: white; padding-top: 50px;">About</h1>
              <p class="mb-0" style="color: rgba(255,255,255,0.7);">Haii ini tentang kamii dan waktu yang Kami Lewati.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="current">About</li>
          </ol>
        </div>
      </nav>
    </div>

    <section id="about" class="about section" style="background: transparent;">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4">
            <img src="{{ asset('assets/img/profile-img.jpeg') }}" class="img-fluid" alt=""
              style="border-radius: 15px; border: 2px solid rgba(239, 158, 239, 0.3);">
          </div>

          <div class="col-lg-5 content"
            style="background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(10px); padding: 30px; border-radius: 20px; border: 1px solid rgba(255, 255, 255, 0.1); color: white;">
            <h2 style="color: #ef9eef;">Our Story</h2>
            <p class="fst-italic py-3">
              Haloow perkenalkan saya <b>Fadhlan</b> dan <b>Raihana (Hanaa)</b>. Jadi ini tentang kamii, alasan kami
              membuat wesbsite ini adalah untuk menyimpan kenangan-kenangan foto-foto kami yang sudah kami abadikan dan
              disimpan di website ini agar tidak hilang ditelan oleh bumi dan kami juga bisa memamerkannya.
            </p>
            <div class="row">
              <div class="col-12">
                <ul style="list-style: none; padding: 0;">
                  <li class="mb-2 d-flex align-items-center">
                    <i class="bi bi-chevron-right me-2" style="color: #ef9eef;"></i>
                    <div class="d-flex align-items-center">
                      <strong class="me-2">Tanggal Jadian :</strong>
                      <span style="white-space: nowrap;">12 Desember 2025</span>
                    </div>
                  </li>
                  <li class="mb-2"><i class="bi bi-chevron-right" style="color: #ef9eef;"></i> <strong>Dibuat Oleh :</strong>
                    <span>Fadhlan</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <style>
    body.about-page {
      background-color: #000;
    }

    .breadcrumbs ol li a,
    .breadcrumbs ol li.current {
      color: white !important;
    }

    /* Memperbaiki warna icon chevron */
    .content ul li i {
      font-weight: bold;
    }
  </style>

  @viteReactRefresh
  @vite(['resources/js/app.jsx'])
@endsection