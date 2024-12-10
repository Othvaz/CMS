@extends('layout')
@section('body')
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="icon" href="img/logo_cgp.jpg" type="image/jpg">
        <title>Can Ngopi</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

    </head>
    <body>
        <div class="container-fluid">

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

        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Can Ngopi 2024</span>
                </div>
            </div>
        </footer>

    </body>
</html>
@endsection
