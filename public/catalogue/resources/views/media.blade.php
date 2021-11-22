@extends('template')

@section('contentMain')
<div class="w-100 d-flex flex-grow-1 flex-column justify-content-start container" style="padding-top: 10px;">
    <h4 class="text-uppercase mb-1">Title : {{$media->title}}</h4>
    <img style="width: 12rem; height: fit-content;" src="{{$media->image}}"/>
    <h2>Description : {{$media->description}}</h2>
    <h2>Category : {{$media->category_name}}</h2>
    <button onclick="window.location.href='{{url('updateMedia/'.$media->id)}}'">Edit</button>
    <form action="{{ url('delete/'.$media->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>

@endsection
