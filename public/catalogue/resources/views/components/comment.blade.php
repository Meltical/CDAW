<div class="flex flex-row w-3/4 h-auto border-solid shadow-lg rounded-lg p-4">
    <!-- Author -->
    <div class="flex flex-col justify-start w-64 ">
        <img class="w-12 h-12 object-cover rounded-full mb-4" src="{{ $author->imageUrl }}" />
        <span>{{ $author->name }}</span>
    </div>
    <!-- text area -->
    <div class="flex-grow text-sm">
        {{ $comment->text }}
    </div>
    <!-- Utils -->
    <div class="flex flex-col justify-start w-64">
        {{-- <a href="{{ route('comments/edit/' . $comment->id) }}"> --}}
        <i class="fas fa-edit"></i>
        {{-- </a> --}}
        {{-- <a href="{{ route('comments/delete/' . $comment->id) }}"> --}}
        <i class="fas fa-trash-alt"></i>
        {{-- </a> --}}
    </div>
</div>
