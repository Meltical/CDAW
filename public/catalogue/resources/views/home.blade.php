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
        <section class="h-screen overflow-y-scroll flex-grow p-10 bg-gray-100">

            <div class="flex justify-between text-xl font-bold mb-6">
                <form method="GET" action="{{ route('media.search') }}" class="flex mb-4 items-center w-3/4 ">
                    @csrf
                    <input type="text" class="w-full h-8 mr-4 rounded " name="search" placeholder="Search..." />
                    <a onclick="searchMedias(event)" class="cursor-pointer">
                        <i class="text-gray-500 fas fa-search"></i>
                    </a>
                </form>
                @if (Auth::user()?->isModerator())
                    <a class="flex justify-center items-center px-3 py-2 rounded-lg bg-red-400 text-white h-10 w-10"
                        href="{{ route('media.create') }}">
                        <i class="fas fa-plus"></i>
                    </a>
                @endif
            </div>


            <div id="mediaContainer" class="flex flex-wrap gap-12">
                @if (!count($medias))
                    <x-empty-page />
                @else
                    @foreach ($medias as $media)
                        <x-card id="{{ $media->id }}" title="{{ $media->title }}" subtitle="{{ $media->studio }}"
                            image_url="{{ $media->imageUrl }}" route="{{ 'media' }}" />
                    @endforeach
                @endif
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
