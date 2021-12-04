<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>NetFloux - Profile</title>
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
                <h2>Profile</h2>
            </div>

            <form action="{{ route('putprofileupdate') }}" method="POST" class="flex flex-col">
                @csrf
                @method('PUT')
                <label class="font-bold text-gray-700" for="name">Name</label>
                <input class="p-2 rounded-md outline-none border mb-6 w-96" id="name" name="name" type="text">
                <label class="font-bold text-gray-700" for="email">Email</label>
                <input class="p-2 rounded-md outline-none border mb-6 w-96" id="email" name="email" type="text">
                <label class="font-bold text-gray-700" for="image">Profile image</label>
                <input class="p-2 rounded-md outline-none border mb-6 w-96" id="image" name="image" type="text">
                <label class="font-bold text-gray-700" for="banner">Banner image</label>
                <input class="p-2 rounded-md outline-none border mb-6 w-96" id="banner" name="banner" type="text">
                <label class="font-bold text-gray-700" for="password">Password</label>
                <input class="p-2 rounded-md outline-none border mb-6 w-96" id="password" name="password" type="text">
                <button
                    class="w-36 hover:bg-red-500 hover:shadow-md rounded-md text-white text-sm font-bold bg-red-400 p-3"
                    type="submit">submit</button>
            </form>


        </section>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
