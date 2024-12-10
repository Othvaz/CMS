@extends('layout')
@section('body')
<div>
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-red-500">Pattern Details</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="patternName"><h5>Pattern Name</h5></label>
                        <p>{{$pattern->title}}</p>

                        <label for="patternImage" class="mt-2"><h5>Pattern Image Preview:</h5></label>
                        @if($pattern->image)
                            <div>
                                {{$pattern->image}}
                                <img src="{{ asset('storage/' . $pattern->image) }}" alt="Pattern Image">
                            </div>
                        @else
                            <p>No image available</p>
                        @endif

                        <div class="d-flex gap-2 mt-3">
                            <form action="{{route('pattern.detail',['id'=>$pattern->id])}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </form>
                            <a href="{{route('pattern.update',['id'=>$pattern->id])}}" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
