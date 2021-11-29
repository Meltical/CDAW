<!DOCTYPE html>
<html lang="fr">

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
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/customStyle.css') }}" rel="stylesheet">
</head>

<body>
    <div class="flex">
        <!-- sidebar -->
        <x-navbar />

        <!-- main content-->
        <section class="h-screen overflow-y-scroll flex-grow p-10 bg-gray-100">
            <div class="flex justify-between text-xl font-bold mb-6">
                <h2>Curated For You</h2>
                <button>
                    <i class="fas fa-sliders-h text-red-600"></i>
                </button>
            </div>

            <div class="flex flex-wrap gap-12">
                <!-- card -->
                <x-card title="Komi San" subtitle="can't talk" image_url="https://images-na.ssl-images-amazon.com/images/I/61Vy74wnrAS.jpghttps://images-na.ssl-images-amazon.com/images/I/61Vy74wnrAS.jpg" />
                <x-card title="Takt op destiny" subtitle="cool" image_url="https://m.media-amazon.com/images/M/MV5BMjU2YTg2MjgtODk0ZC00NGI4LWJmZmItNmM2MDkwYzQ4YTBhXkEyXkFqcGdeQXVyMzgxODM4NjM@._V1_FMjpg_UX1000_.jpg" />
            </div>
        </section>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>