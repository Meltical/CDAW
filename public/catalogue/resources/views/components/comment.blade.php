<div class="flex flex-row w-3/4 justify-between border-solid shadow rounded-lg p-4 bg-white">
    <!-- Author -->
    <div class="flex gap-4">
        <img class="w-12 h-12 object-cover rounded-full mb-4" src="{{ Auth::user()->avatarUrl }}" />
        <div class="flex flex-col">
            <span class="text-sm font-bold text-gray-800">{{ $author->name }}</span>
            <p class="flex-grow text-sm text-gray-700">
                {{ $comment->text }}
            </p>
        </div>
    </div>
    <div class="relative">
        <button onclick="toggle({{ $comment->id }})">
            <i class="fas fa-ellipsis-v text-gray-600"></i>
        </button>
        <div id="comment-{{ $comment->id }}"
            class="absolute hidden -left-10 z-10 rounded-lg px-5 py-3 text-sm text-gray-600 bg-white shadow-xl">
            <button>Modify</button>
            <button class="text-red-500 mt-1">Delete</button>
        </div>
    </div>
    <button id="bg-{{ $comment->id }}" onclick="toggle({{ $comment->id }})"
        class=" h-screen hidden w-screen absolute top-0 left-0"></button>
</div>

<script>
    function toggle(id) {
        const comment = document.getElementById(`comment-${id}`);
        const bg = document.getElementById(`bg-${id}`);
        comment.classList.toggle('hidden');
        bg.classList.toggle('hidden');
    }
</script>
