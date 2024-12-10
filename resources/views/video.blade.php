@extends('layout')
@section('body')
<div>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
    <div class="row">
      <div class="col-lg-6 mb-4">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-red-500">Video Details</h6>
            </div>
            <div class="card-body">
               <div class="form-group">
                  <label for="videoName"><h5>Video Name</h5></label>
                  <p>{{$video->name}}</p>
                  <label for="videoPath"><h5>Video Preview</h5></label>   
                  @if($video->path)
                     <div>
                        <video controls width="100%" style="max-width: 600px;">
                              <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
                        </video>                     
                     </div>
                  @else
                        <p>No video available.</p>
                  @endif
                  <div class="d-flex gap-2 mt-2">
                     <form action="{{route('video.detail',['id'=>$video->id])}}" method="post">
                           @csrf
                           <button type="submit" class="btn btn-primary">Delete</button>
                     </form>
                     <a href="{{route('video.update',['id'=>$video->id])}}" class="btn btn-primary">Edit</a>
                  </div>
               </div>
               
            </div>
         </div>
      </div>
    </div> 
</div>

@endsection