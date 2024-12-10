@extends('layout')
@section('body')
<div>
    <form action="{{route('pattern.create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <p>File name: <input type="text" name="title"></p>
        <p>Pattern: <input type="file" name="pattern"></p>
        <p>Image: <input type="file" name="image"></p>
        <br>
        <button type="submit">Submit</button>
    </form>
<!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
</div>

@endsection