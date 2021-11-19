@extends('bootstrap')

@section('contentMain')

<div class="w-100 d-flex flex-column justify-content-between container" style="padding-top: 10px;">
    <h4 class="text-uppercase mb-1">Anime</h4>
    <div class="w-100 d-flex flex-row justify-content-start gap-3" style="padding: 10px;">
    @foreach ($data["medias"] as $media)
        <div class="card" style="width: 12rem; height: fit-content;">
            <img src="{{$media->image}}"
            class="card-img-top" alt="..." />
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
