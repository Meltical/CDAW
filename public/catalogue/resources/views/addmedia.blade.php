@extends('template')

@section('contentMain')

<div class="container">
    <form id="addFilm" action="{{url('#')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titleMedia"> Title : </label>
            <input type="Titre" class="form-control bottom-1" name="titleMedia" id="titleMedia" aria-describedby="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="descriptionMedia"> Description : </label>
            <input type="Description" class="form-control bottom-1" name="descriptionMedia" id="descriptionMedia" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="imageUrl"> Image Url : </label>
            <input type="Image Url" class="form-control bottom-1" name="imageUrl" id="imageUrl" placeholder="Image Url">
        </div>
        <div class="form-group">
            <label for="category"> Category : </label>
            <select id="category" name="category">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Create the media" />
    </form>
</div>

@endsection
