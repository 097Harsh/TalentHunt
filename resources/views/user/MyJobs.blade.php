@php
$count = 1;
@endphp
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> My Jobs</title>
    <!--/google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <!--//google-fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('user/assets/css/style-starter.css')}}">
    
    <!-- Include jQuery only once to avoid conflict -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    
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
                        <h2 class="w3ltop-title pt-4">My Jobs </h2>
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active"><span class="fas fa-angle-double-right mx-2"></span>My Jobs </li>
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
                Explore Career Opportunities
                </h3>
                <p>Discover a wide range of job openings and find the perfect position for you on our platform today!</p>
            </div>

                
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
                            <td>Application ID</td>
                            <td>Application  Title</td>
                            <td>Application  Description</td>
                            <td>Application Cover Message</td>
                            <td>Application Status</td>
                            <td>Application Experince</td>
                            <td>Application  Date</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($record as $row)
                        <tr data-id="{{$row->job_id}}">
                            <td>{{$count++}}</td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->description}}</td>
                            <td>{{$row->msg}}</td>
                            <td>{{$row->application_status}}</td>
                            <td>{{$row->experince}}</td>
                            <td>{{$row->application_date}}</td>
                          
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
    
    <!-- footer -->
    @include('user.common.footer')
    <!-- //footer -->

    

    <!-- Js scripts -->
    <script src="{{asset('user/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('user/assets/js/theme-change.js')}}"></script>
    <!-- Template JavaScript -->
    <script src="{{asset('user/assets/js/bootstrap.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

</body>

</html>
