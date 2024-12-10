@extends('layout')
@section('body')
<div>
    <p>Marker Name: {{$marker->name}}</p>
    <p>Video Name: {{$marker->video->name}}</p>
    <!-- Add pattern view -->
    <p>Pattern Name: {{$marker->pattern->title}}</p>
    <p>Current Status: @if ($marker->status == 1)
                    <span class="text-success">Active</span>
                @else
                    <span class="text-danger">Inactive</span>
                @endif</p>
    <p>Current Order: {{$marker->order}}</p>
    <div class="flex">
        <a class="btn btn-primary" href="{{route('marker.update_view',['id'=>$marker->id])}}">Edit</a>
        <form action="{{route('marker.detail',['id'=>$marker->id])}}" method="post">
            @csrf
            <input type="hidden" name="delete">
            <button class="btn btn-primary ml-2" type="submit">Delete</button>
        </form>
        <form action="{{route('marker.detail',['id'=>$marker->id])}}" method="post">
            @csrf
            <input type="hidden" name="status_change">
            <button class="btn btn-primary ml-2" type="submit">Change Status</button>
        </form>

    </div>
</div>
@endsection