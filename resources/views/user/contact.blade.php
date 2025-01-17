
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Job portal: Contact</title>
    <!--/google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <!--//google-fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('user/assets/css/style-starter.css')}}">
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
                        <h2 class="w3ltop-title pt-4">Contact Us</h2>
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><span class="fas fa-angle-double-right mx-2"></span> Contact</li>
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
                    <div class="col-lg-5 cont-details pe-lg-5">
                        <div class="contactct-fm-text text-left">
                            <h6 class="title-subhny">Say Hello</h6>
                            <h3 class="title-w3l mb-2">Get In Touch
                            </h3>
                            <p class="mb-sm-5 mb-4">Start working with Us that can provide everything you need to generate awareness,
                                drive traffic,
                                connect.We guarantee that you’ll be able to have any issue resolved within 24 hours.</p>
                            <div class="cont-top">
                                <div class="cont-left text-center">
                                    <span class="fas fa-phone-alt"></span>
                                </div>
                                <div class="cont-right">
                                    <h5>Phone number</h5>
                                    <p><a href="tel:+(21) 255 088 4943">+(21) 255 088 4943</a></p>
                                </div>
                            </div>
                            <div class="cont-top margin-up">
                                <div class="cont-left text-center">
                                    <span class="fas fa-envelope-open-text"></span>
                                </div>
                                <div class="cont-right">
                                    <h5>Send Email</h5>
                                    <p><a href="mailto:DigitMarkrting@mail.com" class="mail">DigitMarkrting@mail.com</a></p>
                                </div>
                            </div>
                            <div class="cont-top margin-up">
                                <div class="cont-left text-center">
                                    <span class="fas fa-map-marker-alt"></span>
                                </div>
                                <div class="cont-right">
                                    <h5>Office Address</h5>
                                    <p class="pr-lg-5">Address here, 434 Agency Honey street,<br> London, UK - 62617.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 cont-details mt-lg-0 mt-5">
                    <div class="container">
                <div class="header-sec text-center mb-5">
                    <h6 class="title-subhny mb-2">Write Us</h6>
                    <h3 class="title-w3l">
                        Don't hesitate to contact us <br> anytime with questions
                    </h3>
                </div>
                <div class="contactct-fm map-content-9">
                @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                    <form action="{{route('storeContact')}}" class="pt-lg-4" method="post">
                        @csrf
                        <div class="twice-two">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required="" value="{{old('name')}}">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="" value="{{old('email')}}">
                            <input type="number" class="form-control" name="contact" id="contact" placeholder="Subject" required="" value="{{old('contact')}}">
                        </div>

                        <textarea class="form-control" id="msg" name="msg" placeholder="Message" required="" value="{{old('msg')}}"></textarea>
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
    <!-- Template JavaScript -->
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
