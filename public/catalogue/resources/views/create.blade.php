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
        <section class="h-screen flex justify-center items-center gap-32 flex-grow p-10 bg-gray-100">
            <div class="w-1/2">
                <a class="flex gap-4 items-center" href="{{ URL::to('test') }}">
                    <i class="fas fa-chevron-left"></i>
                    <span class="block text-sm tracking-widest">BACK</span>
                </a>
                <h1 class="text-3xl font-bold my-8">Create a new Media</h1>
                <form class="flex flex-col justify-center gap-4 text-xl">
                    <label class="ml-4">Title</label>
                    <input class="mb-6 rounded h-12 shadow-lg"/>
                    <label class="ml-4">Description</label>
                    <textarea class="mb-6 rounded shadow-lg"></textarea>
                    <label class="ml-4">Tag(s)</label>
                    <select class="mb-6 rounded w-24 shadow-lg h-10">
                        <option >School</option>
                        <option >Comedy</option>
                        <option >Romance</option>
                    </select>
                    <div class="flex justify-end">
                        <input class="rounded w-32 h-12" type="submit" value="Create"/>
                    </div>
                </form>
            </div>
                <div dropzone="copy" class="w-64 h-64 rounded shadow-lg flex justify-center items-center text-3xl cursor-pointer" alt="poster">
                    <i class="far fa-caret-square-up"></i>
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
