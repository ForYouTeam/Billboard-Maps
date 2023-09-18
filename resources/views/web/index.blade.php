<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Billboard-App</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="{{asset('web/img/favicon.png')}}" rel="icon">
  <link href="{{asset('web/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="{{asset('web/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('web/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('web/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('web/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('web/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('web/css/style.css')}}" rel="stylesheet">
</head>

<style>
  body.modal-open .background-container{
      -webkit-filter: blur(4px);
      -moz-filter: blur(4px);
      -o-filter: blur(4px);
      -ms-filter: blur(4px);
      filter: blur(4px);
  }
</style>
<body>
  <div class="modal fade modalku" id="modalku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

<div class="background-container">
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center">
  
        <div class="logo me-auto">
          {{-- Billboard-App --}}
          <h1><a href="index.html" class="text-capitalize">Billboard-App</a></h1>
        </div>
  
        <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#what-we-do">About</a></li>
            <li><a class="nav-link scrollto" href="#about">Maps</a></li>
            <li><a class="nav-link scrollto" href="#footer">Contact</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
  
        <div class="header-social-links d-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>
  
      </div>
    </header><!-- End Header -->
  
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
      <div class="container text-center text-md-left" data-aos="fade-up">
        <h1>Selamat Datang di Aplikasi <br> <span>Billboard-App</span></h1>
        <h2>Kalian dapat mencari infoarmasi billboard yang berada di kota palu</h2>
        <a href="#about" class="btn-get-started scrollto">Liat Maps</a>
      </div>
    </section><!-- End Hero -->
  
    <main id="main">
      <section id="what-we-do" class="what-we-do">
        <div class="container">
  
          <div class="section-title mt-3">
            <h3>PENJELASAN</h3>
            <p>Berikut adalah penjelasan tentang bagaimana sistem ini dapat berfungsi</p>
          </div>
  
          <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4><a href="">Pencarian Billboard</a></h4>
                <p>Pengguna dapat melakukan pencarian berdasarkan kriteria tertentu, seperti lokasi geografis, ukuran billboard, tipe iklan (statis atau digital), periode iklan, atau harga.</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4><a href="">Informasi Billboard</a></h4>
                <p>Setiap billboard yang terdaftar dalam sistem memiliki profilnya sendiri. Informasi ini meliputi lokasi billboard, dimensi, harga sewa, pemilik, dan informasi kontak.</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4><a href="">Penjadwalan Iklan</a></h4>
                <p>Pengguna dapat mengelola jadwal iklan mereka, termasuk perubahan atau pembatalan yang mungkin diperlukan.</p>
              </div>
            </div>
  
          </div>
  
        </div>
      </section>
          
      <section id="counts" class="counts">
            <div class="container">
  
              <div class="section-title">
                <h2>Biillboard Maps</h2>
                <p class="mb-5">Magnam dolores commodi suscipit consequatur ex aliquid</p>
              </div>
      
              <div class="row">
      
                <div class="col-lg-3 col-6">
                  <div class="count-box">
                    <i class="bi bi-people"></i>
                    <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Pemilik</p>
                  </div>
                </div>
      
                <div class="col-lg-3 col-6">
                  <div class="count-box">
                    <i class="bi bi-box-arrow-down"></i>
                    <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Billboard teris</p>
                  </div>
                </div>
      
                <div class="col-lg-3 col-6 mt-5 mt-lg-0">
                  <div class="count-box">
                    <i class="bi bi-box-arrow-up"></i>
                    <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Billboard Tidak Terisi</p>
                  </div>
                </div>
      
                <div class="col-lg-3 col-6 mt-5 mt-lg-0">
                  <div class="count-box">
                    <i class="bi bi-boxes"></i>
                    <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Jumlah Keseluruhan Billboard</p>
                  </div>
                </div>
              </div>
            </div>
       </section>

      <section id="about" class="about">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-12">
              <img src="web/img/hero-bg.jpg" class="col-12" style="width: 100%; height: 450px" alt=""> {{-- Disini Lokasi Maps --}}
            </div>
            <div class="row icon-boxes">
                <div class="col-md-6 mt-4">
                  <img src="{{asset('assets/icon/active.png')}}" alt="" style="max-width: 3rem">
                  <h4>Keterangan</h4>
                  <p>Gambar diatas menunjukan bahwa lokasi billboard sudah terisi</p>
                </div>
                <div class="col-md-6 mt-4">
                  <img src="{{asset('assets/icon/off.png')}}" alt="" style="max-width: 3rem">
                  <h4>Keterangan</h4>
                  <p>Gambar diatas menunjukan bahwa lokasi billboard belum terisi</p>
                </div>
              </div>
            <div class="col-lg-12 pt-4 pt-lg-0 mt-4">
              <h3>Informasi Billboard</h3>
              <p>
                Sistem Informasi Pencarian Billboard adalah platform atau aplikasi yang digunakan untuk mencari, memilih, 
                dan memesan ruang iklan billboard. Sistem ini membantu pengiklan, agen periklanan, atau individu untuk menemukan lokasi billboard yang sesuai dengan kebutuhan mereka. 
              </p>
              <ul>
                <li><i class="bx bx-check-double"></i>
                  Setiap billboard yang terdaftar dalam sistem memiliki profilnya sendiri. Informasi ini meliputi lokasi billboard, dimensi, harga sewa, pemilik, dan informasi kontak.
                </li>
                <li><i class="bx bx-check-double"></i>
                  Foto atau gambar billboard dapat ditampilkan sehingga pengguna dapat melihat tampilan fisiknya.  
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>

  
    </main><!-- End #main -->
  </div>
    <!-- ======= Footer ======= -->
    <footer id="footer">
  
      <div class="footer-top">
        <div class="container">
          <div class="row">
  
            <div class="col-lg-3 col-md-6 footer-contact">
              <h3>Billboard-App</h3>
              <p>
                Jln Undata No.3  <br>
                Lere, Kec. Palu Barat<br>
                Kota Palu, Sulawesi Tengah 94111 <br><br>
                <strong>Phone:</strong> +62 82235477497<br>
                <strong>Email:</strong> anonymous@gmail.com<br>
              </p>
            </div>
  
            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">About</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Maps</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Contact</a></li>
              </ul>
            </div>
  
            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Our Services</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
              </ul>
            </div>
  
            <div class="col-lg-4 col-md-6 footer-newsletter">
              <h4>Join Our Newsletter</h4>
              <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            </div>
  
          </div>
        </div>
      </div>
  
      <div class="container d-md-flex py-4">
  
        <div class="me-md-auto text-center text-md-start">
          <div class="copyright">
            &copy; Copyright <strong><span>Lumia</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>
    </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="{{asset('web/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('web/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('web/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('web/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('web/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('web/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('web/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('web/js/main.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#modal-show').click(function(){
        $('#modalku').modal('show');
      })
    })
  </script>

</body>

</html>