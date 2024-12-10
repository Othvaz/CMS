<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- <link rel="icon" href="{{asset('images/logo_cgp.jpg')}}" type="image/jpg"> -->
    <title>Can Ngopi - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    @Vite(['resources/css/app.css',
        'resources/js/app.js',
        'resources/css/sb-admin-2.css',
        ])

    <style>
        body {
            background-color: red !important; /* Make the background red */
        }
        /* Custom styles for the image */
        .login-image img {
            width: 100%; /* Makes the image fill the container */
            height: 100%;
            object-fit: contain; /* Ensure the image maintains aspect ratio */
        }

        /* Custom style for red login button with white text */
        .btn-red {
            background-color: red !important; /* Set the background color to red */
            border-color: red !important; /* Set the border color to red */
            color: white !important; /* Set the text color to white */
        }

        .btn-red:hover {
            background-color: darkred !important; /* Darken the button on hover */
            border-color: darkred !important; /* Darken the border on hover */
            color: white !important; /* Ensure the text remains white on hover */
        }
    </style>

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    
                    <div class="card-body p-0">    
                                 
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <!-- Left column with your logo image -->
                            <div class="col-lg-6 d-none d-lg-block login-image">
                                <img src="{{asset('assets/images/logo_cgp.jpg')}}" alt="Logo">
                            </div>

                            <!-- Right column with the login form -->
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger pb-0">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form class="user" action="{{route('login')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <!-- Updated login button with red class and white text -->
                                        <button type="submit" class="btn btn-red btn-user btn-block">
                                            Login
                                        </button>
                                       
                                    </form>
                                  
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
