@extends('layout')
@section('body')
<div>
    <form action="{{route('video.update',['id'=>$video->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update Video</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="videoName">Enter New Video Name:</label>
                                <p>
                                    <input type="text" name="name" class="form-control" value="{{$video->name}}">
                                </p>
                                <label for="videoName">Enter New Video File:</label>
                                <p>
                                    <input type="file" name="video" accept="video/mp4">
                                </p>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
</div>

@endsection