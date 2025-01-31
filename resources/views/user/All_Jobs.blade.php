@php
$count = 1;
@endphp
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Job Portal: All Jobs</title>
    <!--/google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <!--//google-fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('user/assets/css/style-starter.css')}}">
    
    <!-- Include jQuery only once to avoid conflict -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <!-- Bootstrap JS (optional, depending on the features used) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
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
                        <h2 class="w3ltop-title pt-4">All Jobs </h2>
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><span class="fas fa-angle-double-right mx-2"></span>All Jobs </li>
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
                        All Jobs Here
                    </h3>
                    <p>Explore a wide range of career opportunities and find your ideal job on our platform today!</p>
                </div>
                
                <form class="d-flex" action="{{route('search')}}" method="post" id="searchForm">
                    @csrf
                    <div class="input-group">
                        <input class="form-control me-2" type="search" id="search" name="search" placeholder="Search Job Title Here" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="fa fa-search"></i> 
                        </button>
                    </div>
                </form>



                <br>

                <div class="contactct-fm map-content-9">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-hover" id="all-records-table">
                    <thead>
                        <tr>
                            <td>Job ID</td>
                            <td>Job Title</td>
                            <td>Job Description</td>
                            <td>Job Vacancy</td>
                            <td>Job Experience</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody id="searchResults">
                        @foreach($record as $row)
                        <tr data-id="{{$row->job_id}}">
                            <td>{{$count++}}</td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->description}}</td>
                            <td>{{$row->num_of_vacany}}</td>
                            <td>{{$row->experience}}</td>
                            <td colspan="2">
                                <a href="{{ route('MoreDetailsJob', ['id' => $row->job_id]) }}" class="btn btn-success">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <button class="ApplyButton btn btn-primary" id="ApplyButton" name="ApplyButton" data-id="{{$row->job_id}}">Apply</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>
                <!-- Pagination link-->
                <nav aria-label="..." style="float:right;">
                    <ul class="pagination" style="float:right;">
                        @if ($record->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $record->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        @endif

                        @foreach ($record->links()->elements[0] as $page => $url)
                        @if ($page == $record->currentPage())
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                        @endforeach

                        @if ($record->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $record->nextPageUrl() }}">Next</a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Next</a>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!-- /contact2 -->
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
