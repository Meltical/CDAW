@extends('template')

@section('contentMain')

<div class="w-100 d-flex flex-grow-1 flex-column justify-content-start container" style="padding-top: 10px;">
    <button onclick="window.location.href='{{url('addMedia')}}'">Add</button>
    <h4 class="text-uppercase mb-1">Medias</h4>
    <div  class="w-100 d-flex flex-row justify-content-start gap-3" style="padding: 10px; ">
        @foreach ($medias as $media)
        <div onclick="window.location.href='{{url('media/'.$media->id)}}'" class="card" style="width: 12rem; height: fit-content; cursor: pointer;">
            <img src="{{$media->image}}" class="card-img-top" alt="..." />
            <div class="card-body">
                <p class="card-text">
                    {{$media->title}}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
