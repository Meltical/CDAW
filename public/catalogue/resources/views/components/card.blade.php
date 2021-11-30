<a class="w-40 flex flex-col group cursor-pointer" href="{{ URL::to('details/' . $id) }}">
    <img class="h-52 object-cover border-4 border-white rounded group-hover:shadow-lg" src="{{ $imageUrl }}"
        alt="${{ $title }}">
    <h3 class="mt-3">{{ $title }}</h3>
    <span class="text-sm text-gray-500">{{ $subtitle }}</span>
</a>
