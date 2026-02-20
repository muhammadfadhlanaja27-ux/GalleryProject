@extends('layouts.app')

@section('title', 'Gallery - ' . $gallery->title)

@section('body_class', 'gallery-single-page')

@section('content')
  <div id="faulty-terminal-background" class="terminal-container"></div>

  <div class="main-content-wrapper">
    
    <div class="page-title transparent-bg" data-aos="fade">
      <div class="heading">
        <div class="container" style="padding-top: 50px;">
          <div class="row d-flex justify-content-center text-center ">
            <div class="col-lg-8 ">
              <h1 class="gallery-single-title">{{ $gallery->title }}</h1>
              <p class="gallery-single-subtitle">{{ $gallery->description ?? 'Tidak ada deskripsi untuk foto ini.' }}</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="current">Gallery Single</li>
          </ol>
        </div>
      </nav>
    </div>

    <section id="gallery-details" class="gallery-details section transparent-bg">
      <div class="container" data-aos="fade-up">

        <div class="portfolio-details-slider swiper init-swiper single-image-frame">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide text-center">
              <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="img-fluid main-img-render">
            </div>
          </div>
        </div>

        <div class="row justify-content-between gy-4 mt-4">
          <div class="col-lg-8">
            <div class="glass-card desc-box">
              <h2 class="accent-title">Detail Foto: {{ $gallery->title }}</h2>
              <p>{{ $gallery->description }}</p>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="glass-card info-box accent-border">
              <h3 class="info-title">Photo information</h3>
              <ul class="info-list">
                <li><strong>Category:</strong> <span class="accent-text">{{ $gallery->category }}</span></li>
                <li><strong>Upload Photo Tanggal:</strong> <span>{{ $gallery->created_at->format('d M, Y') }}</span></li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>

  @viteReactRefresh
  @vite(['resources/js/app.jsx'])
@endsection