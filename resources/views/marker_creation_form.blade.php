@extends('layout')
@section('body')
<div>
    <form action="{{route('marker.create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <p>
            <b>Marker Name:</b> 
            <input type="text" name="name">
        </p>
        <!-- Pattern Selection -->
        <p><b>Pattern:</b> 
            <select name="pattern_id" id="pattern_id" required>
                <option value="">-- Select a Pattern --</option>
                @foreach ($patterns as $p)
                    <option value="{{ $p->id }}">{{ $p->title }}</option>
                @endforeach
            </select>
        </p>

        <p>
            <b>Video:</b>
            <select name="video_id" id="video_id" required>
                <option value="">-- Select a Video --</option>
                @foreach ($videos as $v)
                    <option value="{{$v->id}}">{{$v->name}}</option>
                @endforeach
            </select>
        </p>
        <br></br>
        <button type="submit">Submit</button>
    </form>
</div>
@endsection