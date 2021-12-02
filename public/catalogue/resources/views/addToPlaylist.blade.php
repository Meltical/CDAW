<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="playlist-route" content="{{ route('playlists') }}">
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
                <h2>Select a playlist to add
                    <span class="italic text-red-500">
                        {{ $mediaName }}
                    </span> to
                </h2>
            </div>

            <div class="flex flex-wrap gap-12">
                @foreach ($playlists as $playlist)
                    <button class="text-left block flex" onclick="postToPlaylist({{ $playlist }})">
                        <x-card class="card" id="{{ $playlist->id }}" title="{{ $playlist->name }}"
                            subtitle="{{ $playlist->size }} anime"
                            image_url="{{ $playlist->imageUrl ?? asset('img/empty.png') }}"
                            route="{{ 'playlists' }}" :isRedirect="false" />
                    </button>
                @endforeach
            </div>
        </section>
    </div>
    <script>
        function postToPlaylist(playlist) {
            const playlistId = playlist.id;
            const mediaId = @json($mediaId);
            const payload = {
                playlistId: playlistId,
                mediaId: mediaId
            }
            const csrf_token = (document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            fetch("/catalogue/public/playlist/add", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": csrf_token
                },
                body: JSON.stringify(payload)
            }).then(res => {
                console.log("Request complete! response:", res);
            }).then(() => {
                const playlist_route = (document.querySelector('meta[name="playlist-route"]').getAttribute(
                    'content')); //this is not okay :(
                window.location.replace(playlist_route);

            });
        }
    </script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
