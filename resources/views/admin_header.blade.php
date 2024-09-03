@php
    $url = request()->path();
    $parts = explode('/', $url);
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Website 2024-25</title>
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.css">
    <script src="{{ URL::to('/') }}/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ URL::to('/') }}/fontawesome/css/all.css">
    <script src="{{ URL::to('/') }}/js/jquery-3.7.1.min.js"></script>
    <script src="{{ URL::to('/') }}/js/jquery.validate.js"></script>
    <script src="{{ URL::to('/') }}/js/additional-methods.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row bg-dark">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <a class="navbar" href="{{ URL::to('/') }}/index">
                            <img src="{{ URL::to('/') }}/images/logo_white.png" height="20%" width="35%" />
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-90">
                                <li class="nav-item">
                                    <a class="nav-link @if ($parts[0] == 'AdminDashboard') active btn btn-success @endif"
                                        aria-current="page" href="{{ URL::to('/') }}/AdminDashboard">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($parts[0] == 'ManageUsers') active btn btn-success @endif"
                                        href="{{ URL::to('/') }}/ManageUsers">Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($parts[0] == 'ManageProducts') active btn btn-success @endif"
                                        href="{{ URL::to('/') }}/ManageProducts">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($parts[0] == 'ManageOrders') active btn btn-success @endif"
                                        href="{{ URL::to('/') }}/ManageOrders">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($parts[0] == 'ManageFAQ') active btn btn-success @endif"
                                        href="{{ URL::to('/') }}/ManageFAQ">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($parts[0] == 'ManageSlider') active btn btn-success @endif"
                                        href="{{ URL::to('/') }}/ManageSlider">Slider</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($parts[0] == 'ManageBestPractices') active btn btn-success @endif"
                                        href="{{ URL::to('/') }}/ManageBestPractices">Best Practices</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($parts[0] == 'AboutPage') active btn btn-success @endif"
                                        href="{{ URL::to('/') }}/AboutPage">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($parts[0] == 'ManageFooter') active btn btn-success @endif"
                                        href="{{ URL::to('/') }}/ManageFooter">Footer</a>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle"
                                    data-bs-toggle="dropdown">
                                    My Account
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ URL::to('/') }}/AdminChangeProfile">Change
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ URL::to('/') }}/AdminChangePassword">Change
                                            Password</a></li>
                                    <li><a class="dropdown-item" href="{{ URL::to('/') }}/AdminLogout">Logout</a></li>
                                </ul>
                            </div>
                            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <br>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        {{--  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>  --}}
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!!!</strong> {{ session('success') }}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!!!</strong> {{ session('error') }}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @yield('dynamic_section')

    <br>

    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 justify-content-center">
                    <h5>About Us</h5>
                    <p class="small justify-content-center">
                        We are a company dedicated to providing the best web development solutions. Our goal is to help
                        our clients build their online presence.
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('index.php') }}" class="text-white">Home</a></li>
                        <li><a href="{{ url('about.php') }}" class="text-white">About</a></li>
                        <li><a href="{{ url('gallery.php') }}" class="text-white">Gallery</a></li>
                        <li><a href="{{ url('contact.php') }}" class="text-white">Contact</a></li>
                        <li><a href="{{ url('login.php') }}" class="text-white">Login</a></li>
                        <li><a href="{{ url('register.php') }}" class="text-white">Register</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5>Contact</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt"></i>&nbsp; Computer Department, </li>
                        <li><i class=""></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;School of Diploma Studies, </li>
                        <li><i class=""></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RK University, Rajkot-360004</li>
                        <li><i class="fas fa-phone"></i> &nbsp;Mo. +91 8155825235</li>
                        <li><i class="fas fa-envelope"></i> &nbsp;janki.kansagra@rku.ac.in</li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5>Follow Us</h5>
                    <ul class="list-unstyled">
                        <li><i class="fab fa-facebook-f"></i>&nbsp; <a href="#" class="text-white">Facebook</a>
                        </li>
                        <li><i class="fab fa-twitter"></i> &nbsp; <a href="#" class="text-white">Twitter</a>
                        </li>
                        <li><i class="fab fa-linkedin"></i> &nbsp;<a href="#" class="text-white">LinkedIn</a>
                        </li>
                        <li><i class="fab fa-instagram"></i> &nbsp;<a href="#" class="text-white">Instagram</a>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2024 Janki Kansagra. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>
