@extends('template')

@section('contentMain')

<div class="container">
    <form id="addFilm" action="{{url('#')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titleMedia"> Title : </label>
            <input type="Titre" class="form-control bottom-1" name="titleMedia" id="titleMedia" aria-describedby="title" placeholder="{{$data["media"]->title}}">
        </div>
        <div class="form-group">
            <label for="descriptionMedia"> Description : </label>
            <input type="Description" class="form-control bottom-1" name="descriptionMedia" id="descriptionMedia" placeholder="{{$data["media"]->description}}">
        </div>
        <div class="form-group">
            <label for="imageUrl"> Image Url : </label>
            <input type="Image Url" class="form-control bottom-1" name="imageUrl" id="imageUrl" placeholder="{{$data["media"]->image}}">
        </div>
        <div class="form-group">
            <label for="category"> Category : </label>
            <select id="category" name="category">
                @foreach ($data["categories"] as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Update the media" />
    </form>
</div>

@endsection
