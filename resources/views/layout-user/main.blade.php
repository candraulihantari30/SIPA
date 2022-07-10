<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SIPA Desa Adat Temukus</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  @include('layout-user.style')
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo">
        <a href="index.html">
          <img class="logo mb-3 align-items-center" src="{{asset('assets/image/LogoD .png')}}" width="35" alt="Logo">
          SIPA
        </a>
      </h1>
      <nav id="navbar" class="navbar ml-auto">
        <ul>
          <li><a class="nav-link scrollto" href="#">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#2">Prajuru</a></li>
          <li><a class="nav-link scrollto" href="#3">Jadwal Kegiatan</a></li>
          <li><a class="nav-link scrollto" href="#4">Hubungi Kami</a></li>
          <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <a href="/login" class="btn btn-primary ml-3">Masuk</a>
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>SIPA Desa Adat Temukus</h1>
          <h2>SIPA merupakan Sistem Informasi Pendapatan Asli Desa Adat Temukus.</h2>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{asset('assets/image/desa.jpeg')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Team Section ======= -->
    <section id="2" class="team section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Prajuru Desa Adat</h2>
          <p>22 November sd 2 September 2024</p>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="member d-flex align-content-lg-center" data-aos="zoom-in" data-aos-delay="100">
              <div><img src="assets/image/kekade.jpg" class="img-fluid" width="70px"></div>
              <div class="member-info">
                <h4>Bendesa Adat</h4>
                <span>MADE SUKARTHA, S.Pd</span>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
              <div><img src="assets/image/widiada.png" class="img-fluid" width="70px"></div>
              <div class="member-info">
                <h4>Patajuh</h4>
                <span>MADE WIDIADA</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
              <div><img src="assets/image/sumawa.jpg" class="img-fluid" width="70px"></div>
              <div class="member-info">
                <h4>Penyarikan</h4>
                <span>I GEDE SUMAWA</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-4 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
              <div><img src="assets/image/gunak.jpg" class="img-fluid" width="70px"></div>
              <div class="member-info">
                <h4>Petengen</h4>
                <span>MADE GUNAKSA, S.Pd</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
              <div><img src="assets/image/aryawan.jpg" class="img-fluid" width="70px"></div>
              <div class="member-info">
                <h4>Staf Administrasi</h4>
                <span>NYOMAN ARYAWAN</span>
              </div>
            </div>
          </div>
        </div>
        <div class="section-title mt-5">
          <h2>Kelian Banjar Adat</h2>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-4 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
              <div><img src="assets/image/Suarta.jpg" class="img-fluid" width="70px"></div>
              <div class="member-info">
                <h4>Bingin Banjah</h4>
                <span>NYOMAN SUARTA</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
              <div><img src="assets/image/aryawan.jpg" class="img-fluid" width="70px"></div>
              <div class="member-info">
                <h4>Labuhan Aji</h4>
                <span>NYOMAN ARYAWAN</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-4 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
              <div><img src="assets/image/swastika1.png" class="img-fluid" width="60px"></div>
              <div class="member-info">
                <h4>Banjar Tengah</h4>
                <span>I KETUT SWASTIKA</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
              <div><img src="assets/image/Kuwatra.jpg" class="img-fluid" width="70px"></div>
              <div class="member-info">
                <h4>Pengayaman</h4>
                <span>I PUTU KUWATRA</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Team Section -->

    <!-- ======= Services Section ======= -->

    <section id="3" class="contact">
      <div class="container" data-aos="fade-up align-self-center">

        <div class="section-title">
          <h2>Jadwal Kegiatan</h2>
          <p>Daftar Kegiatan Desa Adat</p>
        </div>
        <div class="row justify-content-center">
          @foreach ($jdl as $kgt)
          <div class="col-lg-4 d-flex align-self-center mb-3">
            <div class="info">
              <h4 class="text-center">{{$kgt->tgl}}</h4>
              <h6 class="mt-4">{{$kgt->nm_kgtn}}</h6>
              <h6 class="mt-2">{{$kgt->jam}}</h6>
              <div class="d-flex justify-content-end">
                <a href="#mymodal" data-remote="{{ route('detail.kegiatan', $kgt->id_kegiatan) }}" data-toggle="modal" data-target="#mymodal" data-title="Detail Kegiatan" class="btn btn-primary">Detail</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>


    <!-- End Services Section -->

    <!-- ======= Contact Section ======= -->
    <section id="4" class="contact">
      <div class="container" data-aos="fade-up align-self-center">

        <div class="section-title">
          <h2>Hubungi Kami</h2>
          <p>Jika memiliki kendala silakan hubungi</p>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-6 d-flex align-self-center">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Alamat</h4>
                <p>Kantor Balai Adat Temukus, Jl. Singaraja-Seririt Km. 17</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email</h4>
                <p>temukusdesaadat@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telepon</h4>
                <p>085903714007</p>
              </div>

            </div>
          </div>

    </section><!-- End Contact Section -->





  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        Copyright <strong><span>2022</span></strong>
      </div>
      <div class="credits">
        by <i class="fa fa-heart" aria-hidden="true"></i> Kadek Candra Ulihantari
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  @include('layout-user.script')
  <script>
    jQuery(document).ready(function($) {
      $('#mymodal').on('show.bs.modal', function(e) {
        var button = $(e.relatedTarget);
        var modal = $(this);
        modal.find('.modal-body').load(button.data("remote"));
        modal.find('.modal-title').html(button.data("title"));
      });
    });
    $('#mymodal').appendTo("body").modal('show');
  </script>
  <div class="modal" id="mymodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <i class=" bi bi-clock"></i>
        </div>
      </div>
    </div>
  </div>


</body>

</html>