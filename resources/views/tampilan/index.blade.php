@extends('layout.front_layout')

@section('konten')
    

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-lg-1">
            <h1>{{$data->judul}}</h1>
            <h2>ブカシ市で最高の学校</h2>
            <div class="d-flex justify-content justify-content-lg-start">
                <a href="" class="btn-get-started">Get started</a>
                <a href="https://youtu.be/U0JvLzfx_PM" class="btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
        </div>
        <div class="col-lg-6 order-1 order lg-2 hero-img">
            <img width="100%" height="100%" style="object-fit: cover" src="{{ asset('public/image/'. $data->nama_banner) }}" alt="">
        </div>
    </div>
</div>

</section>{{-- End  header--}}

<main id="main">

    {{-- logo --}}
<section id="clients" class="clients section-bg">
    <div class="container">
        <div class="row">
          @foreach ($data_logo as $item)
              
          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="{{asset('public/image/'. $item->logo_banner)}}" alt="" class="img-fluid">
          </div>
          @endforeach
        </div>

    </div>
</section>
{{-- End Logo section --}}

{{-- About Section  --}}
<section id="about" class="about">
    <div class="container">

        <div class="section-title">
            <h2>{{$data_about->judul}}</h2>
        </div>

        <div class="row content">
            <div class="col-lg-6">
                <p>
                    {{$data_about->content1}}
                </p>
                <ul>
                    <li><i class="ri-check-double-line"></i>RIWAYAT KEPALA SEKOLAH</li>
                    <li><i class="ri-check-double-line"></i>Drs. Muryanto (1997 s.d 2000)</li>
                    <li><i class="ri-check-double-line"></i>Drs. H. Chaerudin, M.Pd (2008 s.d 2011)</li>
                    <li><i class="ri-check-double-line"></i>Drs. Sugiyono, MM (2018 s.d 2021)</li>
                    <li><i class="ri-check-double-line"></i>Drs. Boan, Mpd (2021 s.d sekarang)</li>
                </ul>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
                <p>
                   {{$data_about->content2}}
                </p>
                <a href="#" class="btn-learn-more">Learn More</a>
            </div>
        </div>

    </div>
</section>

{{-- WHy Us Section --}}
<section id="why-us" class="why-us section-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
                <div class="content">
                    <h3>Kompetensi<strong>Keahlian</strong></h3>
                </div>

                <div class="accordion-list">
                    <ul>
                      @foreach ($data_kompetensi as $item)
                          
                      <li>
                        <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span>{{$item->judul}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                          <p>
                            {{$item->deskripsi}}
                          </p>
                        </div>
                      </li>
      
                      @endforeach
                </ul>
        </div>
    </div>
    <div class="col-lg-5 d-flex  align-items-center justify-content-center order-1 order-lg-2"><img src="public/image/SMKN 1 bks.png" class="img-fluid" alt="">&nbsp;</div>
    </div>

</div>
</section>

{{-- Prestasi --}}

<section id="skills" class="skills">
    <div class="container">

      <div class="row">
        <div class="col-lg-6 d-flex align-items-center">
          <img src="public/image/medal-design-template-89182c980b9f3214cca1dca00b3d27b4_screen.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content">
          <h3>Prestasi</h3>
          <p class="fst-italic">
            Prestasi yang pernah diraih oleh siswa/i SMK Negeri 1 Kota Bekasi diantaranya:
          </p>

          <div class="skills-content">
            <div class="row">
            @foreach ($data_prestasi as $item)
            
            <div class="col-6">
              <div class="card">
                <div class="card-body">
                  <p class="card-text">{{{$item->judul}}}</p>
                </div>
              </div>
            </div>
            
            @endforeach
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Skills Section -->

  <!-- ======= Frequently Asked Questions Section ======= -->
  <section id="faq" class="faq section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>EKSTRAKULIKULER</h2>
        <p>Berikut beberapa ekstrakulikuler</p>
      </div>

      <div class="faq-list">
        <ul>
          @foreach ($data_ekstrakulikuler as $item)
              
          <li data-aos="fade-up" data-aos-delay="100">
            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">{{$item->judul}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
              <p>
                {{$item->deskripsi}}
              </p>
            </div>
          </li>
          @endforeach

        </ul>
      </div>

    </div>
  </section><!-- End Frequently Asked Questions Section -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Jika ada kendala atau ada yang ingin menananyakan tentang kami silahkan hubungi lewat contact dibawah ini</p>
      </div>

      <div class="row">

        <div class="col-lg-5 d-flex align-items-stretch">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>Jl. Bintara VIII No.2, RT.005/RW.003, Bintara, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17134, Indonesia</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>info@smkn1kotabekasi.sch.id</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>02188951151</p>
            </div>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6670.434777953216!2d106.95570043292562!3d-6.228851122215414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698c89a57526f1%3A0xa850dc0a366b403c!2sSMKN%201%20Bekasi!5e0!3m2!1sen!2sbg!4v1673931379489!5m2!1sen!2sbg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

        </div>
        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
          <form action="{{route('simpan-pesan')}}" method="post" role="form" class="php-email-form">
            @csrf
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
              <div class="form-group col-md-6">
                <label for="name">Your Name</label>
                <input type="text" name="name"  class="form-control" id="name" required>
                @error('name')
                <span class="text-danger"> {{ $message }} </span>
            @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="name">Your Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
              </div>
            </div>
            <div class="form-group">
              <label for="name">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject" required>
              @error('subject')
              <span class="text-danger"> {{ $message }} </span>
            @enderror
            </div>
            <div class="form-group">
              <label for="name">Message</label>
              <textarea class="form-control" name="message" rows="10" required></textarea>
              @error('content')
              <span class="text-danger"> {{ $message }} </span>
            @enderror
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->
</main><!-- End #main -->
  @endsection
