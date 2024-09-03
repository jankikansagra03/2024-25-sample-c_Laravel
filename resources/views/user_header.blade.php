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
                                    <a class="nav-link @if ($parts[0] == 'Products') active btn btn-success @endif"
                                        href="{{ URL::to('/') }}/Products">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($parts[0] == 'MyOrders') active btn btn-success @endif"
                                        href="{{ URL::to('/') }}/MyOrders">My Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($parts[0] == 'contact') active btn btn-success @endif"
                                        href="{{ URL::to('/') }}/contact">Contact Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($parts[0] == 'Cart') active btn btn-success @endif"
                                        href="{{ URL::to('/') }}/Cart">My Cart</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($parts[0] == 'Wishlist') active btn btn-success @endif"
                                        href="{{ URL::to('/') }}/Wishlist">My Wishlist</a>
                                </li>

                            </ul>
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle"
                                    data-bs-toggle="dropdown">
                                    My Account
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ URL::to('/') }}/UserChangeProfile">Change
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ URL::to('/') }}/UserChangePassword">Change
                                            Password</a></li>
                                    <li><a class="dropdown-item" href="{{ URL::to('/') }}/UserLogout">Logout</a></li>
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
