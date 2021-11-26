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
            <div class="w-1/2 custom-top">
                <a class="flex gap-4 items-center" href="{{ URL::to('test') }}">
                    <i class="fas fa-chevron-left"></i>
                    <span class="block text-sm tracking-widest">BACK</span>
                </a>
                <h1 class="text-3xl font-bold mt-8">Komi-san wa, Comyushou desu</h1>
                <div class="my-4">
                    <span class="text-sm text-red-600 border-red-300 rounded border py-1 px-2">comedy</span>
                    <span class="text-sm text-red-600 border-red-300 rounded border py-1 px-2">school</span>
                </div>
                <p class="leading-6 tracking-wider text-sm">It's Shouko Komi's first day at the prestigious Itan Private High School, and she has already risen to the status of the school's Madonna. With long black hair and a tall, graceful appearance, she captures the attention of anyone who comes across her. There's just one problem though—despite her popularity, Shouko is terrible at communicating with others.</p>
                <button class="bg-red-500 rounded-lg mt-10 px-6 py-3 text-white hover:shadow-lg hover:bg-red-600">
                    <i class="fas fa-play text-sm mr-3"></i>
                    <span class="text-sm">
                        Watch Trailer
                    </span>
                </button>
                <button class="border border-gray-300 ml-3 rounded-full w-12 h-12 hover:shadow">
                    <i class="fas fa-edit text-gray-600"></i>
                </button>
                <button class="border border-gray-300 ml-3 rounded-full w-12 h-12 hover:shadow">
                    <i class="fas fa-trash-alt text-gray-600"></i>
                </button>
            </div>
            <div class="custom-top">
                <img class="w-64 rounded shadow-lg" src="https://images-na.ssl-images-amazon.com/images/I/61Vy74wnrAS.jpghttps://images-na.ssl-images-amazon.com/images/I/61Vy74wnrAS.jpg" alt="poster">
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
