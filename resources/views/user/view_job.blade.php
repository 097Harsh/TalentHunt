@php
$count = 1;
@endphp
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>All Jobs</title>
    <!--/google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <!--//google-fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('user/assets/css/style-starter.css')}}">

    <!-- Include jQuery (required by Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Keep only this version -->

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> <!-- Correct Select2 version -->

   
</head>

<body>
    <!--/Header-->
    @include('user.common.header')
    <!--//Header-->

    <!-- breadcrumb -->
    <section class="w3l-about-breadcrumb">
        <div class="breadcrumb-bg breadcrumb-bg-about">
            <div class="container py-lg-5 py-sm-4">
                <div class="w3breadcrumb-gids text-center">
                    <div class="w3breadcrumb-info mt-5">
                        <h2 class="w3ltop-title pt-4">View Jobs </h2>
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active"><span class="fas fa-angle-double-right mx-2"></span>View Jobs </li>
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
                    <h3 class="title-w3l">
                        View Job More Detail Here
                    </h3>
                    <p>Explore a wide range of career opportunities and find your ideal job on our platform today!</p>
                </div>

                <div class="contactct-fm map-content-9">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-hover">
                    <tr>
                        <td>Job Title</td>
                        <td>{{$record->title}}</td>
                    </tr>
                    <tr>
                        <td>Job Description</td>
                        <td>{{$record->description}}</td>
                    </tr>
                    <tr>
                        <td>Job Number Of Hiring</td>
                        <td>{{$record->num_of_vacany}}</td>
                    </tr>
                    <tr>
                        <td>Job Experience</td>
                        <td>{{$record->experience}}</td>
                    </tr>
                    <tr>
                        <td>Job Skills Required</td>
                        <td>{{$record->job_skill_required}}</td>
                    </tr>
                    <tr>
                        <td>Job Posted Date</td>
                        <td>{{$record->posted_date}}</td>
                    </tr>
                    <tr>
                        <td>Job Closing Date</td>
                        <td>{{$record->closing_date}}</td>
                    </tr>
                    <tr>
                        <td>Job Type</td>
                        <td>{{$record->category_name}}</td>
                    </tr>
                    <tr>
                        <td>Job Department</td>
                        <td>{{$record->department_name}}</td>
                    </tr>
                    <tr>
                        <td>Job Contact Email</td>
                        <td>{{$record->ContactEmail}}</td>
                    </tr>
                    <tr>
                        <td>Company Name</td>
                        <td>{{$record->name}}</td>
                    </tr>
                    <tr>
                        <td>Company Contact</td>
                        <td>{{$record->contact}}</td>
                    </tr>
                    <tr>
                        <td>Company Website</td>
                        <td>{{$record->website_url}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <button class="ApplyButton btn btn-success" data-id="{{$record->job_id}}">Apply</button>
                            <a href="{{route('AllJobs')}}"><button class="btn btn-danger">Back</button></a>
                        </td>
                    </tr>
                </table>
                </div>
                <!-- ApplyButton Model --->
                <div class="modal fade" id="ApplyModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" id="ApplyUserForm" enctype="multipart/form-data" action="{{ route('AppliedJob') }}">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Apply To This Job</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <input type="hidden" name="job_id" id="job_id">
                                    <div class="modal-body">
                                        <!-- Experience Field -->
                                        <div class="mb-3 mt-3">
                                            <label for="experience">Enter Your Experience:</label>
                                            <span class="error" style="color:red;">*</span>
                                            <input type="text" class="form-control" id="experience" name="experience" value="{{ old('experience') }}" required>
                                            <!-- Display Validation Error if Any -->
                                            @error('experience')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Resume Field -->
                                        <div class="mb-3 mt-3">
                                            <label for="resume">Please Upload Your Resume:</label>
                                            <span class="error" style="color:red;">*</span>
                                            <input type="file" class="form-control" id="resume" name="resume" value="{{ old('resume') }}" required>
                                            <!-- Display Validation Error if Any -->
                                            @error('resume')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Cover Message Field -->
                                        <div class="mb-3 mt-3">
                                            <label for="msg">Enter Your Cover Message:</label>
                                            <span class="error" style="color:red;">*</span>
                                            <textarea class="form-control" id="msg" name="msg" required>{{ old('msg') }}</textarea>
                                            <!-- Display Validation Error if Any -->
                                            @error('msg')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Yes, Apply</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ApplyButton').click(function (e) {
                e.preventDefault();
                var JobId = $(this).data('id');
                $('#job_id').val(JobId);

                $('#ApplyModel').modal('show');
            });
        });
    </script>

</body>

</html>
