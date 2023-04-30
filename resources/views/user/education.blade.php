@extends('UserLayout.web')

@section('title','education')

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
              EDUCATION
            </h3>
            <p class="subtitle-a">
              Below is a list of my education
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <!-- Education Start -->
      <div class="education mb-4" id="education">
        <div class="content-inner">
            <div class="row align-items-center">
              @foreach ($data as $index => $item)
                <div class="col-md-6">
                    <div class="edu-col">
                        <span>{{ $item->DateFrom }} <i>to</i> {{ $item->DateTo }}</span>
                        <h3>{{ $item->Education }}</h3>
                        <p>{{ $item->Description }}</p>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </div>
    </div>
  </section><!-- End Education Section -->
@endsection
