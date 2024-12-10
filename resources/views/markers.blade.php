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
                    <!-- Upload Pattern Cards -->
                    <?php $i = 1; ?>
                    @foreach ($markers as $m)
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Marker {{$i}}</h6>
                        </div>
                        <div class="card-body">
                            <p>
                                <b>Marker Name:</b> 
                                {{$m->name}}
                            </p>
                            <!-- Pattern Selection -->
                            <p>
                                <b>Pattern:</b> 
                                {{$m->pattern ? $m->pattern->title : 'No pattern assigned'}}
                            </p>
                            @if ($m->pattern && $m->pattern->image)
                                <button class="btn btn-info" onclick="toggleImage({{$i}})">View Pattern Image</button>
                                <div id="image-container-{{$i}}" class="image-container mt-2">
                                    <div>
                                        <img src="{{asset('storage/' . $m->pattern->image)}}" alt="Pattern Image">
                                    </div>
                                </div>
                            @endif
                            <p>
                                <b>Video:</b>
                                {{ $m->video ? $m->video->name : 'No video assigned' }}
                            </p>
                            @if($m->video && $m->video->path)
                                <button class="btn btn-info" onclick="toggleVideo({{$i}})">View Video</button>
                                <!-- Hidden video content -->
                                <div id="video-container-{{$i}}" class="video-container" style="margin-top: 10px;">
                                    <div style="margin-bottom: 10px;">
                                        <video controls width="100%" style="max-width: 600px;">
                                            <source src="{{ asset('storage/' . $m->video->path) }}" type="video/mp4">
                                        </video>                     
                                    </div>
                                </div>
                            @endif
                            <p><b>Current Status:</b> @if ($m->status == 1)
                                <span class="text-success">Active</span>
                                @else
                                <span class="text-danger">Inactive</span>
                                @endif
                            </p>

                        <div class="d-flex gap-2 mt-2">
                            <form action="{{route('marker.update_view',['id'=>$m->id])}}" method="get" enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                            <form action="{{route('marker.update', ['id'=>$m->id])}}" method="post">
                                @csrf
                                <input type="hidden" name="status_change">
                                <button type="submit" class="btn btn-primary">Change Status</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                    @endforeach
                </div>

                <div class="col-lg-6 mb-4">
                    <!-- Pattern List and .patt file button -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Marker List</h6>
                        </div>
                        <div class="card-body">
                            @if (count($markers) > 0 and $markers)
                                @foreach ($markers as $p)
                                    <a href="{{route('marker.detail',['id'=>$p->id])}}" class="text-red-500">
                                        <p>{{$p->name}}</p>
                                    </a>
                                @endforeach
                            @else
                                <p>No Markers!</p>
                            @endif
                        </div>

                        <!-- Button to make .patt file -->
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
        <script>
            function toggleVideo(index) {
                const videoContainer = document.getElementById(`video-container-${index}`);
                videoContainer.classList.toggle('open');
            }

            function toggleImage(index) {
                const imageContainer = document.getElementById(`image-container-${index}`);
                imageContainer.classList.toggle('open');
            }
        </script>

    </body>
</html>
@endsection
