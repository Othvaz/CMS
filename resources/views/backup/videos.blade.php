@extends('layout')
@section('body')
<a href="{{route('video.create')}}">Create</a>

@if (session('status'))
<div class="bg-green-200 rounded text-red-500 p-2">
    {{session('status')}}
</div>
@endif
<div class="">
    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->

     <!-- <p>Hello World!!! From me!</p>
      -->
     @if ($videos and count($videos) > 0)
        @foreach($videos as $v)
            <p> <a href="{{route('video.detail', ['id'=>$v->id])}}" class="text-red-500"> {{$v->name}} -- {{$v->path}}</a></p>
        @endforeach
    @else
        <p>No video!</p>
    @endif
     <p><a href="{{route('video.mass_delete')}}">Truncate</a></p>
</div>

@endsection