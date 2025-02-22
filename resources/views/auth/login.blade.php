<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Login</title>
    <!--/google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <!--//google-fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('user/assets/css/style-starter.css')}}">
</head>

<body>
    <!--/Header-->
    @include('user.common.header')
    <!--//Header-->
    
    <!-- Theme Switcher Dropdown (Light/Dark) -->
    <div class="theme-switcher">
        <select id="theme-switch-dropdown" aria-label="Switch Theme">
            <option value="light">Light Mode</option>
            <option value="dark">Dark Mode</option>
        </select>
    </div>

    <!-- breadcrumb -->
    <section class="w3l-about-breadcrumb">
        <div class="breadcrumb-bg breadcrumb-bg-about">
            <div class="container py-lg-5 py-sm-4">
                <div class="w3breadcrumb-gids text-center">
                    <div class="w3breadcrumb-info mt-5">
                        <h2 class="w3ltop-title pt-4">Get logged in</h2>
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><span class="fas fa-angle-double-right mx-2"></span> login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//breadcrumb-->

    <!-- contact2 -->
    <section class="w3l-contact-1 w3hny-form-btm py-5" id="login">
        <div class="contacts-9 py-lg-5 py-md-4">
            <div class="container">
                <div class="header-sec text-center mb-5">
                    <h6 class="title-subhny mb-2">Please Log In</h6>
                    <h3 class="title-w3l">
                        Access your job opportunities and <br> manage your career anytime
                    </h3>
                </div>
                @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <div class="contactct-fm map-content-9">
                    <form action="{{route('login')}}" class="pt-lg-4" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Enter Your Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" value="{{ old('email') }}" required="">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Enter Your Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" value="{{ old('password') }}" required="">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        </div>
                        <div class="form-check mt-4 mb-3">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember" style="width: 16px; height: 16px;">
                            <label for="remember_me" class="form-check-label text-sm text-gray-600 dark:text-gray-400" style="font-size: 0.875rem;">
                                {{ __('Remember me') }}
                            </label>
                        </div>
                        <div class="text-lg-center">
                            <!-- Submit Button -->
                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-style mt-lg-5 mt-4">login</button>
                        </div>
                    </form>
                    <!-- Message for Users Not Registered -->
                    <p class="mt-4 text-center">Don't have an account? <a href="{{ route('register') }}" class="text-primary">Register here</a> to get started with your job search!</p>    
                </div>
            </div>
        </div>
    </section>
    <!-- /contact2 -->

    <!-- footer -->
    @include('user.common.footer')
    <!-- //footer -->

    <!-- Js scripts -->
    <script src="{{asset('user/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('user/assets/js/theme-change.js')}}"></script>
    <!-- Template JavaScript -->
    <script src="{{asset('user/assets/js/bootstrap.min.js')}}"></script>

</body>

</html>