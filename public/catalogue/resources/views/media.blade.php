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
        <section class="h-screen w-full overflow-scroll bg-gray-100">
            <div class="flex flex-row justify-center gap-32 flex-grow p-10">
                <div class="w-1/2 custom-top">
                    <a class="flex gap-4 items-center" href="{{ url()->previous() }}">
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
                    <div class="flex gap-2">
                        @if ($media->trailerUrl != null)
                            <a href="{{ $media->trailerUrl }}" target="_blank"
                                class="bg-red-500 rounded-lg px-6 py-3 text-white hover:shadow-lg hover:bg-red-600"
                                style="min-width: 10rem">
                                <i class="fas fa-play text-sm mr-3"></i>
                                <span class="text-sm">
                                    Watch Trailer
                                </span>
                            </a>
                        @endif
                        @if (Auth::user() != null)
                            <a href="{{ action('HistoryController@store', $media->id) }}"
                                class="flex justify-center items-center border border-gray-300 ml-3 rounded-full w-12 h-12 hover:shadow"
                                style="min-width: 3rem">
                                @if (App\Models\History::where('media_id', '=', $media->id)->where('user_id', '=', Auth::user()->id)->exists())
                                    <i class="far fa-eye text-red-500"></i>
                                @else
                                    <i class="far fa-eye text-gray-600"></i>
                                @endif
                            </a>
                            <a href="{{ action('LikeController@likeService', $media->id) }}"
                                class="flex justify-center items-center border border-gray-300 ml-3 rounded-full w-12 h-12 hover:shadow"
                                style="min-width: 3rem">
                                @if ($isLiked)
                                    <i class="fas fa-heart text-red-500"></i>
                                @else
                                    <i class="far fa-heart text-gray-600"></i>
                                @endif
                            </a>
                            <a href="{{ action('PlaylistController@addToPlaylistPage', $media->id) }}"
                                class="flex justify-center items-center border border-gray-300 ml-3 rounded-full w-12 h-12 hover:shadow"
                                style="min-width: 3rem">
                                <i class="far fa-list-alt text-gray-600"></i>
                            </a>
                        @endif
                        @if (Auth::user()?->isModerator())
                            <a href="{{ url('media/update/' . $media->id) }}"
                                class="flex justify-center items-center border border-gray-300 ml-3 rounded-full w-12 h-12 hover:shadow"
                                style="min-width: 3rem">
                                <i class="fas fa-edit text-gray-600"></i>
                            </a>
                            <form action="{{ url('media/delete/' . $media->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="border border-gray-300 ml-3 rounded-full w-12 h-12 hover:shadow">
                                    <i class="fas fa-trash-alt text-gray-600"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="custom-top">
                    <img class="w-64 rounded shadow-lg" src="{{ $media->imageUrl }}" alt="poster">
                </div>
            </div>
            <div class="flex flex-col items-center gap-6 mt-6 mb-12">
                <form action="{{ route('comment.store') }}" method="post" class="flex gap-4 w-3/4 mx-auto">
                    @csrf
                    <input name="text" placeholder="write a comment..."
                        class="block outline-none rounded border shadow text-gray-700 flex-grow p-3" type="text">
                    <input type="text" name="media_id" value="{{ $media->id }}" class="hidden">
                    <button type="submit"
                        class="p-4 text-white rounded-md font-bold text-sm bg-red-400 hover:bg-red-500">Send</button>
                </form>
                @foreach ($comments as $comment)
                    <x-comment :comment="$comment" :author="App\Models\User::findOrFail($comment->user_id)" />
                @endforeach
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
