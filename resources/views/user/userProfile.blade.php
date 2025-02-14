@php 
$count_id = $user_profile->country_id;
$state_id = $user_profile->state_id;
$city_id = $user_profile->city_id;

//echo "<pre>";print_r($skills);die;
@endphp

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Job Portal: Update Profile</title>
    <!--/google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <!--//google-fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('user/assets/css/style-starter.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.1/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.1/dist/js/bootstrap-select.min.js"></script>
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Include jQuery (required by Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Keep only this version -->

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> <!-- Correct Select2 version -->

    <!-- Bootstrap JS (optional, depending on the features used) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    
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
                        <h2 class="w3ltop-title pt-4">Update Profile </h2>
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><span class="fas fa-angle-double-right mx-2"></span> Update Profile </li>
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
                    <h6 class="title-subhny mb-2">Please Update Profile</h6>
                    <h3 class="title-w3l">
                        Update your profile to enhance your job opportunities and <br> take control of your career anytime
                    </h3>
                </div>
                <div class="contactct-fm map-content-9">
                @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                    <form action="{{route('UpdateProfile')}}" class="pt-lg-4" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <label for="number">Enter Your Contact Number</label>
                            <input type="number" class="form-control" name="contact" id="contact" placeholder="Enter your contact" value="{{ $user_profile->contact }}" required>
                            @error('contact')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="objective">Enter Your Objective </label>
                            <textarea name="objective" id="objective" class="form-control" placeholder="Enter your objective" required>{{ $user_profile->objective }}</textarea>
                            @error('objective') 
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="address">Enter Your Address </label>
                            <textarea name="address" id="address" class="form-control" placeholder="Enter your address" required>{{ $user_profile->address }}</textarea>
                            @error('address') 
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="designation">Enter Your Designation </label>
                            <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter your Designation" value="{{ $user_profile->designation }}" required>
                            @error('designation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                       <!-- Resume Upload Section -->
                        <div class="form-group">
                            <label for="resume">Upload your resume</label>
                            <input type="file" class="form-control" name="resume" id="resume" placeholder="Enter your resume">
                            @error('resume')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Image Upload Section -->
                        <div class="form-group">
                            <label for="image">Upload your pic</label>
                            <input type="file" class="form-control" name="image" id="image" placeholder="Enter your image">
                            @if ($user_profile->user_image)
                                <img src="{{asset('user/upload/img/'.$user_profile->user_image)}}" style="height:50px;   ">
                            @else
                                <img src="" id="imagePreview" style="height:50px;" />
                            @endif
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                         <!-- Multi-Select Course Dropdown -->
                        <div class="form-group">
                        <label for="courses">Enter Your Course </label>
                            <div class="dropdown-wrapper">
                                <select class="form-control selectpicker" name="courses[]" id="courses" multiple>
                                    <option value="" disabled selected>-----Select Course-----</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->course_name }}" 
                                                @if(in_array($course->course_name, explode(',', $user_profile->course))) selected @endif>
                                            {{ $course->course_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('courses')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Multi-Select Skill Dropdown -->
                        <div class="form-group">
                        <label for="skill_id">Enter Your Skill </label>
                            <div class="dropdown-wrapper">
                                <select class="form-control selectpicker" name="skill_id[]" id="skill_id" multiple required>
                                    <option value="" disabled selected>-----Select Skill Set-----</option>
                                    @foreach($skills as $skill)
                                        <option value="{{ $skill->skill_name }}" 
                                                @if(in_array($skill->skill_name, explode(',', $user_profile->skills))) selected @endif>
                                            {{ $skill->skill_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('skill_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <!-- Country Dropdown -->
                        <div class="form-group">
                        <label for="count_id">Enter Your Country </label>
                            <div class="dropdown-wrapper">
                                <select class="form-control" name="count_id" id="count_id" required="">
                                    <option value="" disabled selected>-----Select an Country-----</option>
                                    
                                </select>
                                @error('count_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- State Dropdown -->
                        <div class="form-group">
                        <label for="state_id">Enter Your State </label>
                            <div class="dropdown-wrapper">
                                <select class="form-control" name="state_id" id="state_id" required="">
                                    <option value="" disabled selected>-----Select a State-----</option>
                                    
                                </select>
                                @error('state_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- City Dropdown -->
                        <div class="form-group">
                        <label for="city_id">Enter Your City </label>
                            <div class="dropdown-wrapper">
                                <select class="form-control" name="city_id" id="city_id" required="">
                                    <option value="" disabled selected>-----Select a City-----</option>
                                    
                                </select>
                                @error('city_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="text-lg-center">
                            <!-- Submit Button -->
                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-style mt-lg-5 mt-4">Update Profile</button>
                        </div>
                    </form>
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
    $(document).ready(function() {
        // Grab the values from the Blade template
        var CountryId = "{{$count_id}}";
        var StateId = "{{$state_id}}";
        var CityId = "{{$city_id}}";

        // Fetch country list on page load
        $.ajax({
            url: "/get_country", // Endpoint to fetch countries
            type: 'GET',
            success: function(data) {
                $('#count_id').empty(); // Clear any existing options
                $('#count_id').append('<option value="" disabled selected>-----Select a Country-----</option>'); // Add default option
                var countries = data;
                for (var i = 0; i < countries.length; i++) {
                    var selected = countries[i].country_id == CountryId ? 'selected' : ''; // Check if the country should be selected
                    $('#count_id').append('<option value="' + countries[i].country_id + '" ' + selected + '>' + countries[i].country_name + '</option>');
                }
                if (CountryId) {
                    $('#count_id').val(CountryId).trigger('change');
                }
            }
        });

        // For state
        $('#count_id').change(function() {
            var countryId = $(this).val();
            console.log(countryId);
            $('#state_id').empty();
            $('#state_id').append('<option value="">Select a State</option>');
            $('#city_id').empty();
            $('#city_id').append('<option value="">Select a City</option>');
            
            if (countryId) {
                $.ajax({
                    url: "/get_state",
                    type: "GET",
                    data: { id: countryId },
                    success: function(data) {
                        console.log("stateid:", StateId);
                        for (var i = 0; i < data.length; i++) {
                            var selected = data[i].state_id == StateId ? 'selected' : '';
                            $('#state_id').append('<option value="' + data[i].state_id + '" ' + selected + '>' + data[i].state_name + '</option>');
                        }
                        if (StateId) {
                            $('#state_id').val(StateId).trigger('change');
                        }
                    }
                });
            }
        });

        // For city
        $('#state_id').change(function() {
            var stateId = $(this).val();
            console.log("stateid:", stateId);
            $('#city_id').empty();
            $('#city_id').append('<option value="">Select a City</option>');
            
            if (stateId) {
                $.ajax({
                    url: '/get_city',
                    type: 'GET',
                    data: { id: stateId },
                    success: function(data) {
                        for (var i = 0; i < data.length; i++) {
                            var selected = data[i].city_id == CityId ? 'selected' : '';
                            $('#city_id').append('<option value="' + data[i].city_id + '" ' + selected + '>' + data[i].city_name + '</option>');
                        }
                        if (CityId) {
                            $('#city_id').val(CityId);
                        }
                    }
                });
            }
        });
    });
</script>

</body>

</html>
