<!-- footer -->
<section class="w3l-footer-29-main">
        <div class="footer-29 py-5">
            <div class="container py-lg-4">
                <div class="row footer-top-29">
                    <div class="col-lg-4 col-md-6 footer-list-29 footer-1 pe-lg-5">
                        <div class="footer-logo mb-4">
                            <h2><a class="navbar-brand" href="index.html">
                                    <span class="sublog">Talent</span>Hunt
                                </a></h2>
                        </div>
                        <p>Find your dream job with us! Explore thousands of career opportunities and take the next step in your professional journey.</p>
                        <div class="w3l-two-buttons mt-4">
                           <!-- <a href="#trail" class="btn btn-primary btn-style"> Try it For Free </a> -->
                        </div>
                        <div class="main-social-footer-29 mt-5">
                            <a href="https://www.facebook.com/share/1DdFB3LauW/" class="facebook"><span class="fab fa-facebook-f"></span></a>
                            <a href="https://x.com/TelentHunt2025" class="twitter"><span class="fab fa-twitter"></span></a>
                            <a href="https://www.instagram.com/talenthunt079?igsh=NGVpdzVjZmg3MzBx" class="instagram"><span class="fab fa-instagram"></span></a>
                            <a href="https://www.linkedin.com/in/telent-hunt-770b32362/" class="linkedin"><span class="fab fa-linkedin-in"></span></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 footer-list-29 footer-2 mt-sm-0 mt-5">

                        <ul>
                            <h6 class="footer-title-29">Links</h6>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="{{ route('AllJobs')}}"> Jobs</a></li>
                            <li><a href="{{ route('feedback') }}">Feedback</a></li>
                            <li><a href="{{ route('contact') }}">Contact us</a></li>

                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-6 footer-list-29 footer-3 mt-lg-0 mt-5">
                        <h6 class="footer-title-29">Job Seekers</h6>
                        <ul>
                            <li><a href="#findjobs">Find Jobs</a></li>
                            <li><a href="#resume">Upload Resume</a></li>
                            <li><a href="#career">Career Advice</a></li>
                            <li><a href="#internships">Internships</a></li>
                            <li><a href="#alerts">Job Alerts</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-list-29 footer-4 mt-lg-0 mt-5">
                        <h6 class="footer-title-29">Employers</h6>
                        <ul>
                            <li><a href="#postjob">Post a Job</a></li>
                            <li><a href="#recruitment">Recruitment Services</a></li>
                            <li><a href="#screening">Resume Screening</a></li>
                            <li><a href="#branding">Employer Branding</a></li>
                            <li><a href="#support">Employer Support</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-list-29 footer-4 mt-lg-0 mt-5">
                        <h6 class="footer-title-29">Support</h6>
                        <ul>
                            <li><a href="#faq">FAQ</a></li>
                            <li><a href="#contact">Contact Us</a></li>
                            <li><a href="#privacy">Privacy Policy</a></li>
                            <li><a href="#terms">Terms & Conditions</a></li>
                            <li><a href="#blog">Blog</a></li>
                            <li><a href="#help">Help Center</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!-- copyright -->
        <section class="w3l-copyright text-center">
            <div class="container">
                <p class="copy-footer-29">©  All rights reserved. Design by <a href="{{ route('home') }}" target="_blank">
                        TalentHunt</a></p>
            </div>

            <!-- move top -->
            <button onclick="topFunction()" id="movetop" title="Go to top">
                <span class="fas fa-arrow-up"></span>
            </button>
            <script>
                // When the user scrolls down 20px from the top of the document, show the button
                window.onscroll = function() {
                    scrollFunction()
                };

                function scrollFunction() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        document.getElementById("movetop").style.display = "block";
                    } else {
                        document.getElementById("movetop").style.display = "none";
                    }
                }

                // When the user clicks on the button, scroll to the top of the document
                function topFunction() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                }

            </script>
            <!-- /move top -->
        </section>
        <!-- //copyright -->
    </section>
    <!-- //footer -->