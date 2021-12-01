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
        <section class="h-auto flex justify-center items-center gap-32 flex-grow p-10 bg-gray-100">
            <div class="w-3/4">
                <a class="flex gap-4 items-center" href="{{ URL::to('test') }}">
                    <i class="fas fa-chevron-left"></i>
                    <span class="block text-sm tracking-widest">BACK</span>
                </a>
                <h1 class="text-3xl font-bold my-8">Create a new Media</h1>
                <form class="flex flex-row justify-center gap-6" id="createMedia" action="{{ url('#') }}"
                    method="POST">
                    @csrf
                    <div class="flex flex-col justify-center gap-4 text-lg w-full flex-grow">
                        <label class="ml-4">Title</label>
                        <input class="mb-6 rounded h-12 shadow-lg" type="title" name="title" id="title"
                            aria-describedby="title" placeholder="Title" />
                        <label class="ml-4">Description</label>
                        <textarea class="mb-6 rounded shadow-lg resize-none h-32" type="description" name="description"
                            id="description" aria-describedby="description" placeholder="Description"></textarea>
                        <label class="ml-4">Tag(s)</label>
                        <input class="mb-2 rounded h-12 shadow-lg" type="tag1" name="tag1" id="tag1"
                            aria-describedby="tag1" placeholder="Tag 1" />
                        <input class="mb-2 rounded h-12 shadow-lg" type="tag2" name="tag2" id="tag2"
                            aria-describedby="tag2" placeholder="Tag 2" />
                        <input class="mb-2 rounded h-12 shadow-lg" type="tag3" name="tag3" id="tag3"
                            aria-describedby="tag3" placeholder="Tag 3" />
                    </div>
                    <div class="flex flex-col justify-center gap-4 text-lg w-full flex-grow">
                        <label class="ml-4">Studio</label>
                        <input class="mb-6 rounded h-12 shadow-lg" type="studio" name="studio" id="studio"
                            aria-describedby="studio" placeholder="Studio" />
                        <label class="ml-4">Image Url</label>
                        <input class="mb-6 rounded h-12 shadow-lg" type="imageUrl" name="imageUrl" id="imageUrl"
                            aria-describedby="imageUrl" placeholder="Image Url" />
                        <label class="ml-4">Trailer Url</label>
                        <input class="mb-6 rounded h-12 shadow-lg" type="trailerUrl" name="trailerUrl" id="trailerUrl"
                            aria-describedby="trailerUrl" placeholder="Trailer Url" />
                        <div class="flex justify-end">
                            <input class="rounded w-32 h-12" type="submit" value="Create" />
                        </div>
                    </div>
                </form>
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
