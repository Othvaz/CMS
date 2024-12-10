@extends('layout')
@section('body')
<div>
    <form action="{{route('pattern.update',['id'=>$pattern->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update Pattern</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="patternName">Enter New Pattern Name:</label>
                                <p>
                                    <input type="text" name="title" class="form-control" value="{{$pattern->title}}">
                                </p>
                                <label for="videoName" class="mt-2">Enter New .patt File:</label>
                                <p>
                                    <input type="file" name="pattern" accept=".patt">
                                </p>
                                <label for="videoName" class="mt-2">Enter New Image File:</label>
                                <p>
                                    <input type="file" name="image" accept="image/*">
                                </p>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection