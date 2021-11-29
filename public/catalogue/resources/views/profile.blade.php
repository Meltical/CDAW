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
        <section class="flex flex-col h-screen">
            <div class="flex justify-center items-center h-64 border">
                <div class="flex flex-col justify-center items-center">
                    <div class="w-20 h-20 rounded-full mb-4 profile"></div>
                    <span>Komi</span>
                </div>
            </div>
            <div class="flex flex-grow justify-center border-r">
                <div class="p-14">
                    <ul class="flex flex-col gap-4 whitespace-nowrap">
                        <li>
                            <a class="text-red-500 text-lg font-bold" href="#">Discover</a>
                        </li>
                        <li>
                            <a href="#">Library</a>
                        </li>
                        <li>
                            <a href="#">Notification</a>
                        </li>
                        <li>
                            <a href="#">Settings</a>
                        </li>
                        <li>
                            <a class="text-sm text-gray-700 italic" href="#">Help and feedback</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- main content-->
        <section class="h-screen flex justify-center gap-32 flex-grow p-10 bg-gray-100">
            <div>
                <img class="profile-cover-image border rounded-t-2xl shadow-xl object-cover" src="https://furansujapon.com/wp-content/uploads/2021/05/Komi-san-wa-Komyushou-Desu.jpg" alt="cover">
                <div class="flex justify-between mt-4">
                    <div class="flex gap-6">
                        <img class="rounded-full border-4 border-white ml-3 -mt-16 w-36 h-36 object-cover" src="https://45secondes.fr/wp-content/uploads/2021/05/Y-aura-t-il-Komi-san-wa-Comyushou-Anime-Adaptation-Tout-ce-que.png" alt="komi profile">
                        <div>
                            <span class="block font-bold text-2xl">Victor Deliege</span>
                            <span class="block text-gray-600 text-sm">victor.deliege@etu.imt-nord-europe.fr</span>
                        </div>
                    </div>
                    <button class="bg-red-600 h-8 px-3 rounded hover:shadow">
                        <i class="fas fa-edit text-white text-sm"></i>
                        <span class="text-white text-sm">Edit Profile</span>
                    </button>
                </div>
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