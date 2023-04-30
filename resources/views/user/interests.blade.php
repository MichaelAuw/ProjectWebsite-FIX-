@extends('UserLayout.web')

@section('title','interests')

@section('content')

  {{-- @foreach ($data as $item)
      
  @endforeach --}}
  <!-- ======= Services Section ======= -->
  <section id="services" class="services-mf mt-7 pt-5 route">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="title-box text-center">
              <h3 class="title-a">
                Interests
              </h3>
              <p class="subtitle-a">
                Below is a list of my Interests
              </p>
              <div class="line-mf"></div>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach ($data as $index => $item)
            <div class="col-md-4">
              <div class="service-box">
                <div class="service-ico">
                  <span class="ico-circle"><i class="{{ $item->Icon }}"></i></i></span>
                </div>
                <div class="service-content">
                  <h2 class="s-title">{{ $item->Interests }}</h2>
                  <p class="s-description text-center">
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section><!-- End Services Section -->
@endsection
