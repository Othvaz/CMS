@extends('layout')
@section('body')
<div class="row">
    <div class="col-lg-6 mb-4">
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Upload Videos</h6>
            </div>
            
            <div class="card-body">
                
                <form action="{{route('video.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="videoName">Enter Video Name:</label>
                        <p><input type="text" class="form-control" name="name"></p>
                        <label for="videoUpload" class="mt-2">Choose MP4 Video:</label>
                        <p>
                            <input type="file" id="video" name="video" accept="video/mp4" required> <!-- dont forget to add accept="video/mp4"-->
                        </p>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Upload Video</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Video List</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->

                    <!-- <p>Hello World!!! From me!</p>
                    -->
                    @if ($videos and count($videos) > 0)
                        @foreach($videos as $v)
                            <p> <a href="{{route('video.detail', ['id'=>$v->id])}}" class="text-red-500">{{$v->name}}</a></p>
                        @endforeach
                    @else
                        <p>No videos!</p>
                    @endif
                    <p><a href="{{route('video.mass_delete')}}" class="btn btn-primary">Truncate</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection