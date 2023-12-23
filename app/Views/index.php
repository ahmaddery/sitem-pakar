<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>SISTEM PAKAR ANALISIS KEPRIBADIAN </title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
  <!-- Favicon and Apple Touch Icons -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/favicons/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicons/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/favicons/favicon-16x16.png') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/favicons/favicon.ico') ?>">
    <link rel="manifest" href="<?= base_url('assets/img/favicons/manifest.json') ?>">
    <meta name="msapplication-TileImage" content="<?= base_url('assets/img/favicons/mstile-150x150.png') ?>">
    <meta name="theme-color" content="#ffffff">

    <!-- Stylesheets -->
    <link href="<?= base_url('assets/css/theme.css') ?>" rel="stylesheet" />
  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container">
    <a class="navbar-brand" href="<?= base_url('index') ?>">Sistem Pakar</a>


          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="#about">Tentang Kami</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="#departments">Test MBTI</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="#findUs">Kontak</a></li>
            </ul><a class="btn btn-sm btn-outline-primary rounded-pill order-1 order-lg-0 ms-lg-4" href="<?= base_url('login') ?>">Masuk</a>
          </div>
        </div>
      </nav>
      <section class="py-xxl-10 pb-0" id="home">
        <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/hero-bg.png);background-position:top center;background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row min-vh-xl-100 min-vh-xxl-25">
            <div class="col-md-5 col-xl-6 col-xxl-7 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 w-100" src="assets/img/gallery/hero.png" alt="hero-header" /></div>
            <div class="col-md-75 col-xl-6 col-xxl-5 text-md-start text-center py-6">
              <h1 class="fw-light font-base fs-6 fs-xxl-7">Analisi Kepribadian<strong> Diri</strong> Dengan Metode<br />Forward<strong> Chaining</strong></h1>
              <p class="fs-1 mb-5">Temukan keunikan dan potensi dirimu melalui tes kepribadian kami yang inovatif <br />Dengan uji kepribadian kami, kita akan menjelajahi lapisan terdalam dari siapa kamu sebenarnya. </p><a class="btn btn-lg btn-primary rounded-pill" href="<?= base_url('register') ?>" role="button">Daftar</a>
            </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-5" id="departments">

        <div class="container">
          <div class="row">
            <div class="col-12 py-3">
              <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/bg-departments.png);background-position:top center;background-size:contain;">
              </div>
              <!--/.bg-holder-->

              <h1 class="text-center">OUR DEPARTMENTS</h1>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-0">

        <div class="container">
          <div class="row py-5 align-items-center justify-content-center justify-content-lg-evenly">
            <div class="col-auto col-md-4 col-lg-auto text-xl-start">
              <div class="d-flex flex-column align-items-center">
                <div class="icon-box text-center"><a class="text-decoration-none" href="#!"><img class="mb-3 deparment-icon" src="assets/img/icons/neurology.png" alt="..." /><img class="mb-3 deparment-icon-hover" src="assets/img/icons/neurology.svg" alt="..." />
                    <p class="fs-1 fs-xxl-2 text-center">Neurology</p>
                  </a></div>
              </div>
            </div>
            <div class="col-auto col-md-4 col-lg-auto text-xl-start">
              <div class="d-flex flex-column align-items-center">
                <div class="icon-box text-center"><a class="text-decoration-none" href="#!"><img class="mb-3 deparment-icon" src="assets/img/icons/eye-care.png" alt="..." /><img class="mb-3 deparment-icon-hover" src="assets/img/icons/eye-care.svg" alt="..." />
                    <p class="fs-1 fs-xxl-2 text-center">Eye care</p>
                  </a></div>
              </div>
            </div>
            <div class="col-auto col-md-4 col-lg-auto text-xl-start">
              <div class="d-flex flex-column align-items-center">
                <div class="icon-box text-center"><a class="text-decoration-none" href="#!"><img class="mb-3 deparment-icon" src="assets/img/icons/cardiac.png" alt="..." /><img class="mb-3 deparment-icon-hover" src="assets/img/icons/cardiac.svg" alt="..." />
                    <p class="fs-1 fs-xxl-2 text-center">Cardiac care</p>
                  </a></div>
              </div>
            </div>
            <div class="col-auto col-md-4 col-lg-auto text-xl-start">
              <div class="d-flex flex-column align-items-center">
                <div class="icon-box text-center"><a class="text-decoration-none" href="#!"><img class="mb-3 deparment-icon" src="assets/img/icons/heart.png" alt="..." /><img class="mb-3 deparment-icon-hover" src="assets/img/icons/heart.svg" alt="..." />
                    <p class="fs-1 fs-xxl-2 text-center">Heart care</p>
                  </a></div>
              </div>
            </div>
            <div class="col-auto col-md-4 col-lg-auto text-xl-start">
              <div class="d-flex flex-column align-items-center">
                <div class="icon-box text-center"><a class="text-decoration-none" href="#!"><img class="mb-3 deparment-icon" src="assets/img/icons/osteoporosis.png" alt="..." /><img class="mb-3 deparment-icon-hover" src="assets/img/icons/osteoporosis.svg" alt="..." />
                    <p class="fs-1 fs-xxl-2 text-center">Osteoporosis</p>
                  </a></div>
              </div>
            </div>
            <div class="col-auto col-md-4 col-lg-auto text-xl-start">
              <div class="d-flex flex-column align-items-center">
                <div class="icon-box text-center"><a class="text-decoration-none" href="#!"><img class="mb-3 deparment-icon" src="assets/img/icons/ent.png" alt="..." /><img class="mb-3 deparment-icon-hover" src="assets/img/icons/ent.svg" alt="..." />
                    <p class="fs-1 fs-xxl-2 text-center">ENT</p>
                  </a></div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->



      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pb-0" id="about">

        <div class="container">
          <div class="row">
            <div class="col-12 py-3">
              <!--/.bg-holder-->

              <h1 class="text-center">Tentang Kami</h1>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <section class="py-5">
        <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/about-bg.png);background-position:top center;background-size:contain;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 order-lg-1 mb-5 mb-lg-0"><img class="fit-cover rounded-circle w-100" src="assets/img/gallery/health-care.png" alt="..." /></div>
            <div class="col-md-6 text-center text-md-start">
              <h2 class="fw-bold mb-4">We are developing a healthcare <br class="d-none d-sm-block" />system around you</h2>
              <p>Menyediakan tes kepribadian yang dirancang secara cermat untuk memberikan wawasan mendalam tentang aspek-aspek unik dari kepribadian Anda. <br class="d-none d-sm-block" />Dengan pertanyaan yang cerdas dan analisis yang akurat, kami membantu Anda menemukan potensi, mengatasi tantangan, dan merayakan keunikan Anda.</p>
              <div class="py-3">
                <button class="btn btn-lg btn-outline-primary rounded-pill" type="submit">Baca Selengkapnya </button>
              </div>
            </div>
          </div>
        </div>
      </section>


    

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-5">

        <div class="container">
          <div class="row">
            <div class="col-12 py-3">
              <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/people.png);background-position:top center;background-size:contain;">
              </div>
              <!--/.bg-holder-->

              <h1 class="text-center">Testimoni</h1>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <section class="py-8">
        <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/people-bg-1.png);background-position:center;background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row align-items-center offset-sm-1">
            <div class="carousel slide" id="carouselPeople" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                  <div class="row h-100">
                    <div class="col-sm-3 text-center"><img src="assets/img/gallery/people-who-loves.png" width="100" alt="" />
                      <h5 class="mt-3 fw-medium text-secondary">Aprilia Rosiana</h5>
                      <p class="fw-normal mb-0">Komunitas</p>
                    </div>
                    <div class="col-sm-9 text-center text-sm-start pt-3 pt-sm-0">
                      <h2>Respon Bagus!</h2>
                      <div class="my-2"><i class="fas fa-star me-2"></i><i class="fas fa-star me-2"></i><i class="fas fa-star me-2"></i><i class="fas fa-star-half-alt me-2"></i><i class="far fa-star"></i></div>
                      <p>Saya ingin berbagi pengalaman saya dengan menggunakan tes kepribadian di situs web ini. Awalnya, saya skeptis, tetapi setelah mencoba, saya sangat terkesan dengan akurasi dan kedalamannya. Tesnya tidak hanya memberikan wawasan tentang kepribadian saya, tetapi juga memberikan saran dan panduan yang sangat berguna untuk perkembangan pribadi saya. Saya merasa lebih mengenal diri sendiri dan memiliki landasan yang lebih kuat untuk mengambil keputusan. Terima kasih banyak!</p>
                    </div>
                  </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                  <div class="row h-100">
                    <div class="col-sm-3 text-center"><img src="assets/img/gallery/people-who-loves.png" width="100" alt="" />
                      <h5 class="mt-3 fw-medium text-secondary">Jhon Doe</h5>
                      <p class="fw-normal mb-0">UI/UX Designer</p>
                    </div>
                    <div class="col-sm-9 text-center text-sm-start pt-3 pt-sm-0">
                      <h2>Fantastic Response!</h2>
                      <div class="my-2"><i class="fas fa-star me-2"></i><i class="fas fa-star me-2"></i><i class="fas fa-star me-2"></i><i class="fas fa-star-half-alt me-2"></i><i class="far fa-star"></i></div>
                      <p>This medical and health care facility distinguishes itself from the competition by providing technologically advanced medical and health care. A mobile app and a website are available via which you can easily schedule appointments, get online consultations, and see physicians, who will assist you through the whole procedure. And all of the prescriptions, medications, and other services they offer are 100% genuine, medically verified, and proved. I believe that the Livedoc staff is doing an outstanding job. Highly recommended their health care services.</p>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row h-100">
                    <div class="col-sm-3 text-center"><img src="assets/img/gallery/people-who-loves.png" width="100" alt="" />
                      <h5 class="mt-3 fw-medium text-secondary">Jeny Doe</h5>
                      <p class="fw-normal mb-0">Web Designer</p>
                    </div>
                    <div class="col-sm-9 text-center text-sm-start pt-3 pt-sm-0">
                      <h2>Fantastic Response!</h2>
                      <div class="my-2"><i class="fas fa-star me-2"></i><i class="fas fa-star me-2"></i><i class="fas fa-star me-2"></i><i class="fas fa-star-half-alt me-2"></i><i class="far fa-star"></i></div>
                      <p>This medical and health care facility distinguishes itself from the competition by providing technologically advanced medical and health care. A mobile app and a website are available via which you can easily schedule appointments, get online consultations, and see physicians, who will assist you through the whole procedure. And all of the prescriptions, medications, and other services they offer are 100% genuine, medically verified, and proved. I believe that the Livedoc staff is doing an outstanding job. Highly recommended their health care services.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="position-relative z-index-2 mt-5">
                  <ol class="carousel-indicators">
                    <li class="active" data-bs-target="#carouselPeople" data-bs-slide-to="0"></li>
                    <li data-bs-target="#carouselPeople" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselPeople" data-bs-slide-to="2"> </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-5">

        <div class="container">
          <div class="row">
            <div class="col-12 py-3">
              <!--/.bg-holder-->

              <h1 class="text-center">Konsultasi</h1>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <section class="py-8">
        <div class="container">
          <div class="row">
            <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/dot-bg.png);background-position:bottom right;background-size:auto;">
            </div>
            <!--/.bg-holder-->

            <div class="col-lg-6 z-index-2 mb-5"><img class="w-100" src="assets/img/gallery/appointment.png" alt="..." /></div>
            <div class="col-lg-6 z-index-2">
              <form class="row g-3">
                <div class="col-md-6">
                  <label class="visually-hidden" for="inputName">Nama</label>
                  <input class="form-control form-livedoc-control" id="inputName" type="text" placeholder="Nama" />
                </div>
                <div class="col-md-6">
                  <label class="visually-hidden" for="inputPhone">No. Handphone</label>
                  <input class="form-control form-livedoc-control" id="inputPhone" type="text" placeholder="No. Handphone" />
                </div>
                <div class="col-md-6">
                  <label class="form-label visually-hidden" for="inputCategory">Kategori</label>
                  <select class="form-select" id="inputCategory">
                    <option selected="selected">Kategori</option>
                    <option> Ekstrovert</option>
                    <option> Introvert</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="form-label visually-hidden" for="inputEmail">Email</label>
                  <input class="form-control form-livedoc-control" id="inputEmail" type="email" placeholder="Email" />
                </div>
                <div class="col-md-12">
                  <label class="form-label visually-hidden" for="validationTextarea">Pesan</label>
                  <textarea class="form-control form-livedoc-control" id="validationTextarea" placeholder="Pesan" style="height: 250px;" required="required"></textarea>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn btn-primary rounded-pill" type="submit">Kirim</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-5">

        <div class="container">
          <div class="row">
            <div class="col-12 py-3">
              <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/blog-post.png);background-position:top center;background-size:contain;">
              </div>
              <!--/.bg-holder-->

                    <section class="bg-primary">
        <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/cta-bg.png);background-position:center right;margin-top:-8.125rem;background-size:contain;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h2 class="fw-bold text-light">Get an update every week</h2>
              <p class="text-soft-primary">Livedoc was created in order to improve the patient experience. <br />Providing world-class tests, and a wide range of other services.</p>
            </div>
            <div class="col-lg-6">
              <h5 class="mb-3 text-soft-primary">SUBSCRIBE TO NEWSLETTER </h5>
              <form class="row gx-2 gy-2 align-items-center">
                <div class="col">
                  <div class="input-group-icon">
                    <label class="visually-hidden" for="inputEmailCta">Address</label>
                    <input class="form-control form-livedoc-control form-cta-control text-soft-primary" id="inputEmailCta" type="email" placeholder="Email" />
                  </div>
                </div>
                <div class="d-grid gap-3 col-sm-auto">
                  <button class="btn btn-lg btn-light rounded-3 px-5 py-3" type="submit">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <section class="py-0 bg-secondary">
        <div class="bg-holder opacity-25" style="background-image:url(assets/img/gallery/dot-bg.png);background-position:top left;margin-top:-3.125rem;background-size:auto;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row py-8">
            <div class="col-12 col-sm-12 col-lg-6 mb-4 order-0 order-sm-0"><a class="text-decoration-none" href="#"><img src="assets/img/gallery/footer-logo.png" height="51" alt="" /></a>
              <p class="text-light my-4">The world's most trusted <br />telehealth company.</p>
            </div>
            <div class="col-6 col-sm-4 col-lg-2 mb-3 order-2 order-sm-1">
              <h5 class="lh-lg fw-bold mb-4 text-light font-sans-serif">Departments</h5>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="lh-lg"><a class="footer-link" href="#!">Eye care</a></li>
                <li class="lh-lg"><a class="footer-link" href="#!">Cardiac are</a></li>
                <li class="lh-lg"><a class="footer-link" href="#!">Heart care</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-2 mb-3 order-3 order-sm-2">
              <h5 class="lh-lg fw-bold text-light mb-4 font-sans-serif">Membership</h5>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="lh-lg"><a class="footer-link" href="#!">Free trial</a></li>
                <li class="lh-lg"><a class="footer-link" href="#!">Silver</a></li>
                <li class="lh-lg"><a class="footer-link" href="#!">Premium</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-2 mb-3 order-3 order-sm-2">
              <h5 class="lh-lg fw-bold text-light mb-4 font-sans-serif"> Customer Care</h5>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="lh-lg"><a class="footer-link" href="#!">About Us</a></li>
                <li class="lh-lg"><a class="footer-link" href="#!">Contact US</a></li>
                <li class="lh-lg"><a class="footer-link" href="#!">Get Update</a></li>
              </ul>
            </div>
          </div>
        </div>


        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-0 bg-primary">

          <div class="container">
            <div class="row justify-content-md-between justify-content-evenly py-4">
              <div class="col-12 col-sm-8 col-md-6 col-lg-auto text-center text-md-start">
                <p class="fs--1 my-2 fw-bold text-200">All rights Reserved &copy; Your Company, 2021</p>
              </div>
              <div class="col-12 col-sm-8 col-md-6">
                <p class="fs--1 my-2 text-center text-md-end text-200"> Made with&nbsp;
                  <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="#F95C19" viewBox="0 0 16 16">
                    <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                  </svg>&nbsp;by&nbsp;<a class="fw-bold text-info" href="https://themewagon.com/" target="_blank">ThemeWagon </a>
                </p>
              </div>
            </div>
          </div>
          <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


      </section>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="<?= base_url('vendors/@popperjs/popper.min.js') ?>"></script>
    <script src="<?= base_url('vendors/bootstrap/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('vendors/is/is.min.js') ?>"></script>
    <script src="https://scripts.sirv.com/sirvjs/v3/sirv.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="<?= base_url('vendors/fontawesome/all.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/theme.js') ?>"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&amp;family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100&amp;display=swap" rel="stylesheet">
  </body>

</html>