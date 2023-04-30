@extends('UserLayout.web')

@section('title','')

@section('content')

  {{-- @foreach ($data as $item)
      
  @endforeach --}}
    @foreach ($data2 as $item)
        
    @endforeach
   <!-- ======= Contact Section ======= -->
   <section id="contact" class="paralax-mf footer-paralaz bg-image sect-mt4 route" style="background-image: url({{ asset('img/overlay-bg.jpg') }})">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-mf">
            <div id="contact" class="box-shadow-full">
              <div class="row">
                <div class="col-md-6">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      Send Us a Message
                    </h5>
                  </div>
                  <div>
                    <form action="{{ route('Message.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return alert('Message Has been sent')">
                      @csrf
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                          </div>
                        </div>
                        <div class="col-md-12 text-center my-3">
                        </div>
                        <div class="col-md-12 text-center">
                          <button type="submit" class="button button-a button-big button-rouded">Send Message</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="title-box-2 pt-4 pt-md-0">
                    <h5 class="title-left">
                      Get in Touch
                    </h5>
                  </div>
                  <div class="more-info">
                    <p class="lead">
                      Hello Feel free to contact me here. Write any though you had
                      Below here is my Social media
                      You can contact me through one of the social media below
                      or you can contact me by filling the form beside
                    </p>
                    <ul class="list-ico">
                      <div class="wrapper">
                        <div class="icon"><li><i class="bi bi-geo-alt"></i></li></div>
                        <div class="text px-3"><p>Jl. Araya Mansion No.8 - 22, Genitri, Tirtomoyo, Kec. Pakis, Kabupaten Malang, Jawa Timur 65154,</p></div>
                      </div>
                      <div class="wrapper">
                        <div class="icon"><li><i class="bi bi-phone"></i></li></div>
                        <div class="text px-3"><p>{{ $item->Phone }}</p></div>
                      </div>
                      <div class="wrapper">
                        <div class="icon"><li><i class="bi bi-envelope"></i></li></div>
                        <div class="text px-3"><p>{{ $item->Email }}</p></div>
                      </div>
                    </ul>
                  </div>
                  <div class="socials">
                    <ul>
                      @foreach ($data as $index => $item)
                        <li><a href="{{ url('https://'.$item->Link) }}"><span class="ico-circle"><i class="{{ $item->SocialMedia }}"></i></span></a></li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Contact Section -->
@endsection
