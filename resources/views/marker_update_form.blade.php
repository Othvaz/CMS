@extends('layout')
@section('body')
<body>
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update Marker</h6>
            </div>
            
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger pb-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        <form action="{{route('marker.update',['id'=>$marker->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <p>
                <label for="inputName">Marker Name:</label> 
                <input type="text" name="name" class="form-control" value="{{$marker->name}}" placeholder="{{$marker->name}}">
            </p>
            <!-- Pattern Selection -->
            <p><b>Pattern:</b> 
                <select name="pattern_id" id="pattern_id" class="form-control">
                    <option value="">Select Pattern</option>
                    @foreach ($patterns as $p)
                        <option 
                        @if ($marker->pattern and $p->id == $marker->pattern->id)
                            selected
                        @endif
                            value="{{ $p->id }}">{{ $p->title }}</option>
                    @endforeach
                </select>
            </p>

            <p><b>Video:</b> 
                <select name="video_id" id="video_id" class="form-control">
                    <option value="">Select Pattern</option>
                    @foreach ($videos as $v)
                        <option 
                        {{($marker->video and $v->id == $marker->video->id) ? 'selected' : ''}}
                        value="{{ $v->id }}">{{ $v->name }}</option>
                    @endforeach
                </select>
            </p>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        </div>  
    </div>
</body>
@endsection