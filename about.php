<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <title>About Us</title>
  <link rel="icon" href="img/logo.png" type="image/x-icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <?php include 'partials/dbConnect.php';?>
  <?php require 'partials/navbar.php';?>

  <!-- ======= Carousel Section ======= -->
  <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carousel" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carousel" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner" role="listbox">
      <!-- Slide 1 -->
      <div class="carousel-item active">
          <img src="assets/img/slide/slide-1.jpg" alt="" class="d-block w-100">
        <div class="carousel-container">
          <div class="carousel-content">
            <h2 class="animate__animated animate__fadeInDown">Berbelanja<span> dengan mudah di Tumbas</span></h2>
            <a href="index.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
          </div>
        </div>
      </div>
      <!-- Slide 2 -->
      <div class="carousel-item">
          <img src="assets/img/slide/slide-2.jpg" alt="" class="d-block w-100">
        <div class="carousel-container">
          <div class="carousel-content">
            <h2 class="animate__animated animate__fadeInDown mb-0">Misi Kami</h2>
            <p class="animate__animated animate__fadeInUp">Memberikan kemudahan dalam berbelanja kebutuhan sehari-hari</p>
            <a href="index.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
          </div>
        </div>
      </div>
      <!-- Slide 3 -->
      <div class="carousel-item">
          <img src="assets/img/slide/slide-3.jpg" alt="" class="d-block w-100">
        <div class="carousel-container">
          <div class="carousel-content">
            <h2 class="animate__animated animate__fadeInDown mb-0">Praktis, Lengkap, dan Efisien</h2>
            <p>Semua kebutuhan anda telah disediakan lengkap pada platform kami<a href="" target="_blank"></a></p>
            <a href="index.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  </div>
  </section><!-- End Carousel -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <h3>Selamat Datang di <strong>Tumbas</strong></h3>
            <h3><strong>Sebuah E-Commerce karya anak desa</strong></h3>
            <p class="font-italic">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <div class="skills-content">
              <p><b>Rating: </b></p>
              <div class="progress">
                <span class="skill">5 star <i class="val">93%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">4 star <i class="val">90%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">3 star <i class="val">30%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">2 star <i class="val">5%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">1 star <i class="val">2%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <section class="counts section-bg">
      <div class="container">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-simple-smile"></i>
              <span data-toggle="counter-up">6961</span>
              <p><strong>Happy Customers</strong></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-document-folder"></i>
              <span data-toggle="counter-up">16779</span>
              <p><strong>Items Delivered</strong></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-live-support"></i>
              <span data-toggle="counter-up">2781</span>
              <p><strong>Hours Of Support</strong></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-users-alt-5"></i>
              <span data-toggle="counter-up">45</span>
              <p><strong>Hard Workers</strong></p>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Counts Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Our Team</h2>
        </div>

        <div class="row" style="padding-left: 228px;">

          <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.1s">
            <div class="member">
              <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Christopher Neville</h4>
                </div>
                <div class="social">
                  <a href="https://" target="_blank"><i class="icofont-twitter"></i></a>
                  <a href="https://github.com/ChNeville" target="_blank"><i class="fab fa-github"></i></a>
                  <a href="https://" target="_blank"><i class="icofont-linkedin"
                      target="_blank"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.2s">
            <div class="member">
              <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Nico Nathanael </h4>
                </div>
                <div class="social">
                  <a href="https://instagram.com/tribalofvivaldy"><i class="icofont-instagram" target="_blank"></i></a>
                  <a href="https://github.com/Riitsu" target="_blank"><i class="fab fa-github"></i></a>
                  <a href="https://www.facebook.com/niconathanaels/"><i class="icofont-facebook" target="_blank"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.2s">
            <div class="member">
              <img src="assets/img/team/team-5.jpg" class="img-fluid" alt="" style="height: 198px;width: 198px;">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Marcellinus Yoga</h4>
                </div>
                <div class="social">
                  <a href="https://instagram.com/marcelinus.yoga"><i class="icofont-instagram" target="_blank"></i></a>
                  <a href="https://github.com/marcelinusyudistira" target="_blank"><i class="fab fa-github"></i></a>
                  <a href="https://www.facebook.com/marcelinus.yoga.54"><i class="icofont-facebook" target="_blank"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Our Team Section -->
  </main>

  <?php include 'partials/footer.php';?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>
  <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>