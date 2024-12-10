@extends('layout')
@section('body')
<div class="row">
    <div class="col-lg-6 mb-4">
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Upload Pattern</h6>
            </div>
            
            <div class="card-body">
                
                <form action="{{route('pattern.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="titleInput">Input Pattern Name:</label>
                        <p>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </p>
                        <label for="patternUpload" class="mt-2">Choose .patt file:</label>
                        <p>
                            <input type="file" id="pattern" accept=".patt" name="pattern" required>
                        </p>
                        <label for="imageUpload" class="mt-2">Choose Image:</label>
                        <p>
                            <input type="file" id="image" accept="image/*" name="image" required>
                        </p>                                
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit Pattern</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <!-- Pattern List -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pattern List</h6>
                    @if(session('status'))
                        <div class="alert alert-success mt-3">
                            {{ session('status') }}
                        </div>
                    @endif
            </div>
            
            <div class="card-body">
                @if (count($patterns) > 0 and $patterns)
                    @foreach ($patterns as $p)
                        <a href="{{route('pattern.detail',['id'=>$p->id])}}" class="text-red-500">
                            <p>{{$p->title}}</p>
                        </a>
                    @endforeach
                @else
                    <p>No patterns!</p>
                @endif
            </div>

            <!-- Button to make .patt file -->
            <div class="card-footer text-center">
                <a type="button" class="btn btn-info mt-3" href="https://jeromeetienne.github.io/AR.js/three.js/examples/marker-training/examples/generator.html">Click Here to Make .patt File</a>
            </div>
        </div>
    </div>

</div>
@endsection
