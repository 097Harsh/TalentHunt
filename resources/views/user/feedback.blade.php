<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Job portal: FeedBack</title>
    <!--/google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <!--//google-fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('user/assets/css/style-starter.css')}}">
    <style>
        /* Star Rating Styles */
        .star-rating {
            direction: rtl;
            display: inline-block;
        }
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            font-size: 30px;
            color: #d3d3d3;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        .star-rating input[type="radio"]:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #ffcc00;
        }
        .star-rating input[type="radio"]:checked {
            color: #ffcc00;
        }
    </style>
</head>

<body>
    <!--/Header-->
    @include('user.common.header')
    <!--header closed -->
    <!-- breadcrumb -->
    <section class="w3l-about-breadcrumb">
        <div class="breadcrumb-bg breadcrumb-bg-about">
            <div class="container py-lg-5 py-sm-4">
                <div class="w3breadcrumb-gids text-center">
                    <div class="w3breadcrumb-info mt-5">
                        <h2 class="w3ltop-title pt-4">FeedBack</h2>
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><span class="fas fa-angle-double-right mx-2"></span> FeedBack</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//breadcrumb-->
    <!-- contact1 -->
    <section class="w3l-contact-1 py-5" id="contact">
        <div class="contacts-9 py-lg-5 py-md-4">
            <div class="container">
                <div class="row contact-view">
                    <div class="col-lg-12 cont-details mt-lg-0 mt-5">
                        <div class="container">
                            <div class="header-sec text-center mb-5">
                                <h6 class="title-subhny mb-2">Give Us Your Feedback</h6>
                                <h3 class="title-w3l">
                                    We value your thoughts and suggestions <br> to improve our job portal
                                </h3>
                            </div>

                            <div class="contactct-fm map-content-9">
                                @if(session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form action="{{route('store_feedback')}}" class="form-group" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="rating">Rate us:</label>
                                        <div class="star-rating">
                                            <input type="radio" id="st-5" name="rating" value="5" />
                                            <label for="st-5">★</label>
                                            <input type="radio" id="st-4" name="rating" value="4" />
                                            <label for="st-4">★</label>
                                            <input type="radio" id="st-3" name="rating" value="3" />
                                            <label for="st-3">★</label>
                                            <input type="radio" id="st-2" name="rating" value="2" />
                                            <label for="st-2">★</label>
                                            <input type="radio" id="st-1" name="rating" value="1" />
                                            <label for="st-1">★</label>
                                        </div>
                                        @error('rating')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <label for="msg">Enter Your Message</label>
                                    <textarea class="form-control" id="msg" name="msg" placeholder="Message" required="">{{ old('msg') }}</textarea>
                                    @error('msg')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="text-lg-center">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-style mt-lg-5 mt-4">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /contact1 -->
    
    <!-- footer -->
    @include('user.common.footer')
    <!-- //footer -->

    <!-- Js scripts -->
    <script src="{{asset('user/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('user/assets/js/theme-change.js')}}"></script>
    <script src="{{asset('user/assets/js/jquery-1.9.1.min.js')}}"></script>
    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function() {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function() {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!-- //bootstrap -->
    <script src="{{asset('user/assets/js/bootstrap.min.js')}}"></script>

</body>

</html>
