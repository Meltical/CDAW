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
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/customStyle.css') }}" rel="stylesheet">
</head>

<body>
    <div class="flex">
        <!-- sidebar -->
        <x-navbar />

        <!-- main content-->
        <section class="h-auto flex justify-center gap-32 flex-grow p-10 bg-gray-100">
            <div class="w-1/2 custom-top">
                <a class="flex gap-4 items-center" href="{{ URL::to('/') }}">
                    <i class="fas fa-chevron-left"></i>
                    <span class="block text-sm tracking-widest">BACK</span>
                </a>
                <h1 class="text-3xl font-bold mt-8">{{ $media->title }}</h1>
                <div class="my-4">
                    @foreach ($tags as $tag)
                        <span
                            class="text-sm text-red-600 border-red-300 rounded border py-1 px-2">{{ $tag->name }}</span>
                    @endforeach
                </div>
                <p class="mb-4 leading-6 tracking-wider text-sm">
                    @php
                        echo $media->description;
                    @endphp </p>
                <p class="mb-10 text-sm text-gray-500">{{ $media->studio }}</p>
                <a href="{{ $media->trailerUrl }}" target="_blank"
                    class="bg-red-500 rounded-lg px-6 py-3 text-white hover:shadow-lg hover:bg-red-600">
                    <i class="fas fa-play text-sm mr-3"></i>
                    <span class="text-sm">
                        Watch Trailer
                    </span>
                </a>
                <button class="border border-gray-300 ml-3 rounded-full w-12 h-12 hover:shadow">
                    <i class="fas fa-edit text-gray-600"></i>
                </button>
                <button class="border border-gray-300 ml-3 rounded-full w-12 h-12 hover:shadow">
                    <i class="fas fa-trash-alt text-gray-600"></i>
                </button>
            </div>
            <div class="custom-top">
                <img class="w-64 rounded shadow-lg" src="{{ $media->imageUrl }}" alt="poster">
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
