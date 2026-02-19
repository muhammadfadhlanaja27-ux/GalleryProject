@extends('layouts.app')

@section('content')
  <section id="hero" class="hero section pt-5"
    style="position: relative; min-height: 100vh; background: black; overflow: hidden;">

    <div id="faulty-terminal-background" style="position: fixed; inset: 0; z-index: 0;"></div>

    <div class="container" style="position: relative; z-index: 1;">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center" style="color: white; padding-top: 100px;">

          <Span id="text-type-root"></Span>
          <Span id="text-type-subtitle-root"></Span>

          @php
            // Pastikan $galleries ada isinya, kalau kosong kasih array kosong biar React gak crash
            $imageUrls = isset($galleries) ? $galleries->map(function ($item) {
              return asset('storage/' . $item->image);
            }) : [];
          @endphp

          <div id="bounce-cards-root" data-images="{{ json_encode($imageUrls) }}"
            style="display: flex; justify-content: center; min-height: 400px;"></div>

          <div id="circular-gallery-root" data-images="{{ json_encode($imageUrls) }}"
            style="width: 100%; height: 300px; margin: 0 auto;">
          </div>

          <div class="d-flex justify-content-center mt-5">
            <a href="{{ route('gallery') }}">
              <button class="btn-glow">LIHAT SEMUA FOTO</button>
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>

  @viteReactRefresh
  @vite(['resources/js/app.jsx'])
@endsection