@extends('UserLayout.web')

@section('title','home')

@section('content')

  @foreach ($data as $item)
      
  @endforeach
  
  <!-- ======= Hero Section ======= -->
  <div id="hero" class="hero route bg-image" style="background-image: url({{ asset($item->home_image) }})">
    <div class="overlay-itro"></div>
    <div class="hero-content display-table">
      <div class="table-cell">
        <div class="container">
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h1 class="hero-title mb-4">{{ $item->Name }}</h1>
          <p class="hero-subtitle"><span class="typed" data-typed-items="Computer Science, Undergraduate S1,Skills:,@foreach ($data2 as $index => $item2 ) {{ $item2->Name }},@endforeach"></span></p>
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
        </div>
      </div>
    </div>
  </div><!-- End Hero Section -->
@endsection
