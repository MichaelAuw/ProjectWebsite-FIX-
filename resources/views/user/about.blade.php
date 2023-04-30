@extends('UserLayout.web')

@section('title','about')

@section('content')

  @foreach ($data as $item)
      
  @endforeach
   <!-- ======= About Section ======= -->
   <section id="about" class="about-mf mt-7 sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-sm-6 col-md-5">
                    <div class="about-img">
                      <img src="{{ asset($item->image_file_url) }}" class="img-fluid rounded b-shadow-a" alt="">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-7">
                    <div class="about-info">
                      <p><span class="title-s">Name: </span><span>{{ $item->Name }}</span></p>
                      <p><span class="title-s">Profile: </span><span>{{ $item->Profile }}</span></p>
                      <p><span class="title-s">Email: </span><span>{{ $item->Email }}</span></p>
                      <p><span class="title-s">Phone: </span><span>{{ $item->Phone }}</span></p>
                    </div>
                  </div>
                </div>
                <div class="skill-mf">
                  <p class="title-s">Skill</p>
                  @foreach ($data2 as $index=> $item2)
                    <span>{{ $item2->Name }}</span> <span class="pull-right">{{ $item2->Percentage }}%</span>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: {{ $item2->Percentage }}%;" aria-valuenow="{{ $item2->Percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  @endforeach
                </div>
              </div>
              <div class="col-md-6">
                <div class="about-me pt-4 pt-md-0">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      About me
                    </h5>
                  </div>
                  <p class="lead">
                    {{ $item->About }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End About Section -->
@endsection
