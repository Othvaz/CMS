@extends('layout')
@section('body')
<div>
    <form action="{{route('video.create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name">
        <input type="file" name="video">
        <button type="submit">Submit</button>
    </form>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
</div>

@endsection