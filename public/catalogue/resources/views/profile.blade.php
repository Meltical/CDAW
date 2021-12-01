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
        <section class="h-screen flex justify-center gap-32 flex-grow p-10 bg-gray-100">
            <div>
                <img class="profile-cover-image border rounded-t-2xl shadow-xl object-cover"
                    src="{{ Auth::user()->bannerUrl }}" alt="cover">
                <div class="flex justify-between my-4">
                    <div class="flex gap-6">
                        <img class="rounded-full border-4 border-white ml-3 -mt-16 w-36 h-36 object-cover"
                            src="{{ Auth::user()->avatarUrl }}" alt="komi profile">
                        <div>
                            <span class="block font-bold text-2xl text-gray-800">{{ Auth::user()->name }}</span>
                            <span class="block text-gray-600 text-sm">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                    <a href="{{ route('profile.show') }}" class="block bg-red-600 h-8 px-3 rounded hover:shadow">
                        <i class="fas fa-edit text-white text-sm"></i>
                        <span class="text-white text-sm">Edit Profile</span>
                    </a>
                </div>
                <a href="{{ route('my_playlists') }}"
                    class="block flex justify-between items-center bg-white rounded-lg mt-10 p-6 shadow-md">
                    <div class="flex items-center gap-4">
                        <i class="far fa-list-alt text-lg text-green-400"></i>
                        <span class="font-bold text-gray-700">My Playlist</span>
                    </div>
                    <i class="fas fa-arrow-right text-lg text-gray-600"></i>
                </a>
                <a href="{{ route('likes') }}"
                    class="block flex justify-between items-center bg-white rounded-lg mt-6 p-6 shadow-md">
                    <div class="flex items-center gap-4">
                        <i class="fas fa-heart text-lg text-red-400"></i>
                        <span class="font-bold text-gray-700">Liked</span>
                    </div>
                    <i class="fas fa-arrow-right text-lg text-gray-600"></i>
                </a>
                <a href="{{ route('history') }}"
                    class="block flex justify-between items-center bg-white rounded-lg mt-6 p-6 shadow-md">
                    <div class="flex items-center gap-4">
                        <i class="fas fa-history text-lg text-yellow-400"></i>
                        <span class="font-bold text-gray-700">History</span>
                    </div>
                    <i class="fas fa-arrow-right text-lg text-gray-600"></i>
                </a>
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
