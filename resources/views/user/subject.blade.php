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
              SUBJECT
            </h3>
            <p class="subtitle-a">
              Below is a list of my subject that has been taked
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      
      <form action="" method="get">
        @csrf
        <h3>Category Semester:</h3>
        <div class="dropdown mb-3">
          <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-bookmark"></i> Category
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a href="{{ route('subject.index') }}" class="dropdown-item text-dark">ALL</a>
              @foreach ($data2 as $index =>$item)
              <a href="{{ route('subject.index',['category' => $item->id]) }}" class="dropdown-item text-dark">{{ $item->name }}</a>              
              @endforeach
          </div>
        </div>
      </form>
      
      <!-- Subject Start -->
      
      
      {{-- <div class="resume" id="resume">
        <div class="row">
          <div class="col-md-6" data-aos="fade-up">
            @foreach ($data as $index => $item)
            <div class="resume-item">
              <div class="edu-col">
                <h4>{{ $item->Subject }}</h4>
                <h5>{{ $item->DateFrom }} - {{ $item->DateTo }}</h5>
                <p><em>{{ $item->category->name }}</em></p>
                <p>{{ $item->Description }}</p>
              </div>
            </div>
            @endforeach
          </div> --}}
          <div class="education mb-4" id="education">
            <div class="content-inner">
                <div class="row align-items-center">
                  @foreach ($data as $index => $item)
                    <div class="col-md-6">
                        <div class="edu-col">
                            <span>{{ $item->DateFrom }} <i>to</i> {{ $item->DateTo }}</span>
                            <h3>{{ $item->Subject }}</h3>
                            <p class="mb-2"><em>{{ $item->category->name }}</em></p>
                            <p>{{ $item->Description }}</p>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
          </div>
        {{-- </div> --}}
      {{-- </div> --}}
  </section><!-- End Education Section -->
@endsection
