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
        <div class="dropdown ms-auto mb-3">
          <a href="{{ route('subject.index') }}" class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ALL</a>
          @foreach ($data2 as $index =>$item)
          <a href="{{ route('subject.index',['category' => $item->id]) }}" class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $item->name }}</a>
          @endforeach
        </div>
      </form>
      
      <!-- Education Start -->
      
      <div class="education mb-4" id="education">
        <div class="content-inner">
            <div class="row align-items-center">
              @foreach ($data as $index => $item)
                <div class="col-md-6">
                    <div class="edu-col">
                        <span>{{ $item->DateFrom }} <i>to</i> {{ $item->DateTo }}</span>
                        <h3>{{ $item->Subject }}</h3>
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
