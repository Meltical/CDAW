<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>NetFloux</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
    type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">



</head>

<body id="page-top">
  <div class="w-100 d-flex flex-column justify-content-start vh-100">
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark pe-5">
      <a class="navbar-brand ps-5" href="#">NETFLOUX</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link px-3 active" href="#">Anime <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link px-3" href="#">Manga</a>
          <a class="nav-item nav-link px-3" href="#">Search</a>
          <a class="nav-item nav-link ps-3" href="#">Se Connecter</a>
        </div>
      </div>
    </nav>
    @yield('contentMain')
      <!-- Footer-->
      <section class="">
        <!-- Footer -->
        <footer class="text-center text-white" style="background-color: var(--bs-body-color);">
          <!-- Footer About Text-->
          <div class=" p-5">
            <h6 class="text-uppercase mb-1">About NetFloux</h6>
            <small class="mb-0">
              NetFloux is a free to use, MIT licensed Media Collection created
              by
              <a href="https://github.com/MikUwU">MikUwU</a> and
              <a href="https://github.com/BagUwUtsla">BagUwUtsla</a>.
            </small>
          </div>
          <!-- Copyright -->
          <div class="py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; NetFloux 2021</small></div>
          </div>
          <!-- Copyright -->
        </footer>
        <!-- Footer -->
      </section>
    </div>

  </div>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>