<a class="flex flex-col group cursor-pointer" href="{{ URL::to('details/'.$id) }}">
    <img class="w-40 border-4 border-white rounded group-hover:shadow-lg" src="{{ $imageUrl }}" alt="komi san">
    <h3 class="mt-3">{{ $title }}</h3>
    <span class="text-sm text-gray-500">{{ $subtitle }}</span>
</a>