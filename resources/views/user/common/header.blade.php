<header id="site-header" class="fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light stroke py-lg-0">
            <h1><a class="navbar-brand pe-xl-5 pe-lg-4" href="{{ route('home') }}">
                    <span class="sublog">Talent</span>Hunt
                </a></h1>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                <span class="navbar-toggler-icon fa icon-close fa-times"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-lg-auto my-2 my-lg-0 navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">Contact</a>
                    </li>
                    @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('feedback')}}">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('AllJobs')}}">Jobs</a>
                    </li>
                    @endif
                </ul>
                @if(Auth::check())
                <!-- Dropdown Button and Logout -->
                <li class="nav-item me-lg-3">
                    <div class="dropdown">
                        <button class="phone-btn btn btn-primary btn-style ms-2 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{route('userProfile')}}">Update Profile</a></li>
                            <li><a class="dropdown-item" href="{{route('MyJobs')}}">My Jobs </a></li>
                            <li><a class="dropdown-item" href="{{ route('makeResume') }}">Make Resume</a></li>
                            <li class="nav-item me-lg-3">
                                <form action="{{ route('logout') }}" method="POST" class="d-none d-lg-block">
                                    @csrf
                                    <button type="submit" class="phone-btn btn btn-primary btn-style ms-2">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
                @else
                <li class="nav-item me-lg-3">
                    <!-- Button to open the modal -->
                    <button type="button" class="phone-btn btn btn-primary btn-style d-none d-lg-block ms-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button>
                </li>
                @endif
            </ul>
        </div>
    </div>
</header>


<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Login Form -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                        <a href="{{ route('password.request') }}" style="float:right;">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <div class="mt-3 text-center">
                    <p>If you don't have any account  <a href="{{ route('register') }}">click here...</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
