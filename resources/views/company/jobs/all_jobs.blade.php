@php 
$count = 1;
@endphp
<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Manage Jobs</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | Simple Tables" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
      integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{asset('admin/assets/css/adminlte.css')}}" />
    <!--end::Required Plugin(AdminLTE)-->

      <!-- Include only one version of jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- Include Select2 CSS -->
     <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Include jQuery (required by Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Keep only this version -->

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> <!-- Correct Select2 version -->
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      @include('admin.common.header')
      <!--end::Header-->
      <!--begin::Sidebar-->
      @include('admin.common.sidebar')
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Manager Jobs</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item">Dashboard</li>
                  <li class="breadcrumb-item active" aria-current="page">Manage Jobs</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="container">
                @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                
                    <table class="table table-hover">
                        <tr>
                            <td>Job ID</td>
                            <td>Job Title</td>
                            <td>Job Description</td>
                            <td>Job Vacancy</td>
                            <td>Job Experience</td>
                            <td>Job Open</td>
                            <td>Job Contact</td>
                            <td  align="center">Action</td>
                            <td>
                                <button class="AddRecord btn btn-primary" style="float:right;">ADD</button>
                            </td>
                        </tr>
                        @foreach($record as $row)
                          <tr data-id="{{$row->job_id}}">
                              <td>{{$count++}}</td>
                              <td>{{$row->title}}</td>
                              <td>{{$row->description}}</td>
                              <td>{{$row->num_of_vacany}}</td>
                              <td>{{$row->experience}}</td>
                              <td>{{$row->job_skill_required}}</td>
                              <td>{{$row->status}}</td>
                              <td>{{$row->ContactEmail}}</td>
                              <td colspan="2">
                                  <button class="EditRecord btn btn-primary" data-id="{{$row->job_id}}" 
                                  data-title="{{$row->title}}"
                                  data-description="{{$row->description}}"
                                  data-num_of_vacany="{{$row->num_of_vacany}}"
                                  data-experience="{{$row->experience}}"
                                  data-job_skill_required="{{$row->job_skill_required}}"
                                  data-status="{{$row->status}}"
                                  data-job_working_hour="{{$row->job_working_hour}}"
                                  data-posted_date="{{$row->posted_date}}"
                                  data-closing_date="{{$row->closing_date}}"
                                  data-contactemail="{{$row->ContactEmail}}" 
                                  data-category_id="{{$row->category_id}}"
                                  data-department_id="{{$row->department_id}}"
                                  data-country_id="{{$row->country_id}}"
                                  data-state_id="{{$row->state_id }}"
                                  data-city_id="{{$row->city_id }}">Edit</button>
                                  <button class="deleteRecord btn btn-danger" data-id="{{$row->job_id}}" >Delete</button>
                              </td>
                          </tr>
                      @endforeach

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
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!-- Modal -->
      <!-- Modal -->
      <div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <form action="" method="post" id="deleteUserForm">
                      @csrf
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Delete record</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <input type="hidden" name="job_id" id="job_id">
                          <h5>Are you sure you want to delete this course?</h5>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-danger">Yes, delete</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>

      <!--Add record Modal -->
      <!-- Add record Modal -->
      <div class="modal fade" id="AddModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="" method="post" id="AddUserForm">
              @csrf
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Job </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <!-- Job Title -->
                <div class="mb-3">
                  <label for="jobTitle">Job Title:</label>
                  <span class="error" style="color:red;">*</span>
                  <input type="text" class="form-control" id="jobTitle" placeholder="Enter Job Title" name="jobTitle" required>
                </div>

                <!-- Job Description -->
                <div class="mb-3">
                  <label for="jobDescription">Job Description:</label>
                  <span class="error" style="color:red;">*</span>
                  <input type="text" class="form-control" id="jobDescription" placeholder="Enter Job Description" name="jobDescription" required>
                </div>

                <!-- Job Number -->
                <div class="mb-3">
                  <label for="jobNumber"> Looking For Candidate:</label>
                  <span class="error" style="color:red;">*</span>
                  <input type="text" class="form-control" id="jobNumber" placeholder="Enter Job Number" name="jobNumber" required>
                </div>

                <!-- Job Experience -->
                <div class="mb-3">
                  <label for="jobExperience">Require Experience:</label>
                  <span class="error" style="color:red;">*</span>
                  <input type="text" class="form-control" id="jobExperience" placeholder="Enter Job Experience" name="jobExperience" required>
                </div>

                <!-- Job Skills -->
                <div class="mb-3">
                  <label for="jobSkills">Job Skills:</label>
                  <span class="error" style="color:red;">*</span>
                  <select class="form-control selectpicker" name="skill_id[]" id="skill_id" multiple required>
                                    <option value="" disabled selected>-----Select Skill Set-----</option>
                                    @foreach($skills as $skill)
                                        <option value="{{ $skill->skill_name }}">
                                            {{ $skill->skill_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('skill_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                </div>

                <!-- Job Status -->
                <div class="mb-3">
                  <label for="jobStatus">Job Status:</label>
                  <span class="error" style="color:red;">*</span>
                  <select class="form-control selectpicker" name="jobStatus" id="jobStatus">
                    <option value="" disabled selected>-----Select status Set-----</option>
                    <option value="Open">Open</option>  
                    <option value="Filled">Filled</option>  
                    <option value="Close">Close</option>  
                  </select>
                  @error('skill_id')
                   <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Job Working Hour -->
                <div class="mb-3">
                  <label for="jobWorkingHour">Job Working Hour:</label>
                  <span class="error" style="color:red;">*</span>
                  <input type="text" class="form-control" id="jobWorkingHour" placeholder="Enter Job Working Hour" name="jobWorkingHour" required>
                </div>

                <!-- Job Post Date -->
                <div class="mb-3">
                  <label for="jobPostDate">Job Post Date:</label>
                  <span class="error" style="color:red;">*</span>
                  <input type="date" class="form-control" id="jobPostDate" name="jobPostDate" required>
                </div>

                <!-- Job Close Date -->
                <div class="mb-3">
                  <label for="jobCloseDate">Job Close Date:</label>
                  <span class="error" style="color:red;">*</span>
                  <input type="date" class="form-control" id="jobCloseDate" name="jobCloseDate" required>
                </div>

                <!-- Job Contact Email -->
                <div class="mb-3">
                  <label for="jobContactEmail">Job Contact Email:</label>
                  <span class="error" style="color:red;">*</span>
                  <input type="email" class="form-control" id="jobContactEmail" placeholder="Enter Job Contact Email" name="jobContactEmail" required>
                </div>

                <!-- Job Category -->
                <div class="mb-3">
                  <label for="jobCategory">Job Category:</label>
                  <span class="error" style="color:red;">*</span>
                  <select class="form-control selectpicker" name="jobCategory" id="jobCategory"  required>
                                    <option value="" disabled selected>-----Select Job Department-----</option>
                                    @foreach($job_categorys as $job_category)
                                        <option value="{{ $job_category->category_id }}">
                                            {{ $job_category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                </div>

                <!-- Job Department -->
                <div class="mb-3">
                  <label for="jobDepartment">Job Department:</label>
                  <span class="error" style="color:red;">*</span>
                  <select class="form-control selectpicker" name="jobDepartment" id="jobDepartment"  required>
                                    <option value="" disabled selected>-----Select Job Department-----</option>
                                    @foreach($job_departments as $job_department)
                                        <option value="{{ $job_department->department_id }}">
                                            {{ $job_department->department_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('skill_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                </div>

                <!-- Job Country -->
                <div class="mb-3">
                  <label for="jobCountry"> Country:</label>
                  <span class="error" style="color:red;">*</span>
                  <select class="form-control" name="count_id" id="count_id" required="">
                      <option value="" disabled selected>-----Select an Country-----</option>
                  </select>
                  @error('count_id')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Job State -->
                <div class="mb-3">
                  <label for="jobState"> State:</label>
                  <span class="error" style="color:red;">*</span>
                  <select class="form-control" name="state_id" id="state_id" required="">
                      <option value="" disabled selected>-----Select a State-----</option>                
                  </select>
                      @error('state_id')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                </div>

                <!-- Job City -->
                <div class="mb-3">
                  <label for="jobCity"> City:</label>
                  <span class="error" style="color:red;">*</span>
                  <select class="form-control" name="city_id" id="city_id" required="">
                                    <option value="" disabled selected>-----Select a City-----</option>
                  </select>
                  @error('city_id')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Job </button>
              </div>
            </form>
          </div>
        </div>
      </div>



      <!--Edit record Modal -->
      <!-- Edit record Modal -->
      <div class="modal fade" id="EditModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{route('EditJob')}}" method="post" id="EditUserForm">
              @csrf
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Job Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <input type="hidden" name="edit_job_id" id="edit_job_id">

                <!-- Job Title -->
                <div class="mb-3">
                  <label for="jobTitle">Job Title:</label>
                  <span class="error" style="color:red;">*</span>
                  <input type="text" class="form-control" id="EditJobTitle" placeholder="Enter Job Title" name="EditJobTitle" required>
                </div>

                <!-- Job Description -->
                <div class="mb-3">
                  <label for="jobDescription">Job Description:</label>
                  <span class="error" style="color:red;">*</span>
                  <input type="text" class="form-control" id="EditjobDescription" placeholder="Enter Job Description" name="EditjobDescription" required>
                </div>

                <!-- Job Number -->
                <div class="mb-3">
                  <label for="jobNumber">Looking For Candidate:</label>
                  <span class="error" style="color:red;">*</span>
                  <input type="text" class="form-control" id="EditjobNumber" placeholder="Enter Job Number" name="EditjobNumber" required>
                </div>

                <!-- Job Experience -->
                <div class="mb-3">
                  <label for="jobExperience">Require Experience:</label>
                  <span class="error" style="color:red;">*</span>
                  <input type="text" class="form-control" id="EditjobExperience" placeholder="Enter Job Experience" name="EditjobExperience" required>
                </div>

                <!-- Job Skills -->
                <div class="mb-3">
                  <label for="jobSkills">Job Skills:</label>
                  <span class="error" style="color:red;">*</span>
                  <select class="form-control selectpicker" name="Editskill_id[]" id="Editskill_id" multiple required>
                    <option value="" disabled>Select Skills</option>
                    @foreach($skills as $skill)
                        <option value="{{ $skill->skill_name }}" 
                            @if(isset($row) && in_array($skill->skill_name, explode(',', $row->job_skill_required))) selected @endif>
                            {{ $skill->skill_name }}
                        </option>
                    @endforeach
                  </select>

                </div>

                <!-- Job Status -->
                <div class="mb-3">
                    <label for="jobStatus">Job Status:</label>
                    <span class="error" style="color:red;">*</span>
                    <select class="form-control selectpicker" name="EditjobStatus" id="EditjobStatus">
                        <option value="" disabled selected>-----Select Job Status-----</option>
                        <option value="Open">Open</option>
                        <option value="Filled">Filled</option>
                        <option value="Close">Close</option>
                    </select>
                </div>


                <!-- Job Working Hour -->
                <div class="mb-3">
                  <label for="jobWorkingHour">Job Working Hour:</label>
                  <span class="error" style="color:red;">*</span>
                  <input type="text" class="form-control" id="EditjobWorkingHour" placeholder="Enter Job Working Hour" name="EditjobWorkingHour" required>
                </div>

                <!-- Job Post Date -->
                <div class="mb-3">
                  <label for="jobPostDate">Job Post Date:</label>
                  <span class="error" style="color:red;">*</span>
                  <input type="date" class="form-control" id="EditjobPostDate" name="EditjobPostDate" required>
                </div>

                <!-- Job Close Date -->
                <div class="mb-3">
                  <label for="jobCloseDate">Job Close Date:</label>
                  <span class="error" style="color:red;">*</span>
                  <input type="date" class="form-control" id="EditjobCloseDate" name="EditjobCloseDate" required>
                </div>

                <!-- Job Contact Email -->
                <div class="mb-3">
                  <label for="jobContactEmail">Job Contact Email:</label>
                  <span class="error" style="color:red;">*</span>
                  <input type="email" class="form-control" id="EditjobContactEmail" placeholder="Enter Job Contact Email" name="EditjobContactEmail" required>
                </div>

                <!-- Job Category -->
                <div class="mb-3">
                  <label for="jobCategory">Job Category:</label>
                  <span class="error" style="color:red;">*</span>
                  <select class="form-control selectpicker" name="EditjobCategory" id="EditjobCategory" required>
                    <option value="" disabled selected>-----Select Job Category-----</option>
                    @foreach($job_categorys as $job_category)
                      <option value="{{ $job_category->category_id }}">
                        {{ $job_category->category_name }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <!-- Job Department -->
                <div class="mb-3">
                  <label for="jobDepartment">Job Department:</label>
                  <span class="error" style="color:red;">*</span>
                  <select class="form-control selectpicker" name="EditjobDepartment" id="EditjobDepartment" required>
                    <option value="" disabled selected>-----Select Job Department-----</option>
                    @foreach($job_departments as $job_department)
                      <option value="{{ $job_department->department_id }}">
                        {{ $job_department->department_name }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <!-- Job Country -->
                <div class="mb-3">
                  <label for="jobCountry">Country:</label>
                  <span class="error" style="color:red;">*</span>
                  <select class="form-control" name="Editcount_id" id="Editcount_id" required>
                    <option value="" disabled selected>-----Select Country-----</option>
                  </select>
                </div>

                <!-- Job State -->
                <div class="mb-3">
                  <label for="jobState">State:</label>
                  <span class="error" style="color:red;">*</span>
                  <select class="form-control" name="Editstate_id" id="Editstate_id" required>
                    <option value="" disabled selected>-----Select State-----</option>
                  </select>
                </div>

                <!-- Job City -->
                <div class="mb-3">
                  <label for="jobCity">City:</label>
                  <span class="error" style="color:red;">*</span>
                  <select class="form-control" name="Editcity_id" id="Editcity_id" required>
                    <option value="" disabled selected>-----Select City-----</option>
                  </select>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>


      <!--end::App Main-->
      <!--begin::Footer-->
      @include('admin.common.footer')
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
      integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{asset('admin/assets/js/adminlte.js')}}"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->

    <script>
        $(document).ready(function() {

            // Variables for country, state, and city
    var CountryId = "";
    var StateId = "";
    var CityId = "";

    // Fetch the country list on page load
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
        // Trigger to populate states/cities after selecting country
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
            if (data.length > 0) {
              for (var i = 0; i < data.length; i++) {
                var selected = data[i].state_id == StateId ? 'selected' : '';
                $('#state_id').append('<option value="' + data[i].state_id + '" ' + selected + '>' + data[i].state_name + '</option>');
              }
              // Trigger to populate cities after selecting state
              if (StateId) {
                $('#state_id').val(StateId).trigger('change');
              }
            } else {
              // If no states available, disable and show message
              $('#state_id').append('<option value="" disabled>No states available</option>');
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
            if (data.length > 0) {
              for (var i = 0; i < data.length; i++) {
                var selected = data[i].city_id == CityId ? 'selected' : '';
                $('#city_id').append('<option value="' + data[i].city_id + '" ' + selected + '>' + data[i].city_name + '</option>');
              }
            } else {
              // If no cities available, disable and show message
              $('#city_id').append('<option value="" disabled>No cities available</option>');
            }
          }
        });
      }
    });



            $('.deleteRecord').click(function (e) {
                e.preventDefault();
                var user_id = $(this).data('id');  
                console.log("course_id:", user_id);
                //debugger;
                $('#job_id').val(user_id);
                
                $('#deleteUserForm').attr('action', '/delete_job/');

                $('#deleteModel').modal('show');
            });
            
            $('.AddRecord').click(function (e) {
                e.preventDefault();
                
                $('#AddUserForm').attr('action', '/AddJob/');

                $('#AddModel').modal('show');
            });
        
     //edit
    $('.EditRecord').click(function (e) {
      e.preventDefault();

      var jobid = $(this).data('id');
      var jobTitle = $(this).data('title');
      var jobDescription = $(this).data('description');
      var job_experience = $(this).data('experience');
      var job_num_of_vacany = $(this).data('num_of_vacany');
      var job_skill_required = $(this).data('job_skill_required');
      var job_status = $(this).data('status');
      var job_working_hour = $(this).data('job_working_hour');
      var job_posted_date = $(this).data('posted_date'); 
      var job_closing_date = $(this).data('closing_date');
      var ContactEmail = $(this).data('contactemail');
      var job_category_id = $(this).data('category_id');
      var job_department_id = $(this).data('department_id');
      var job_country_id = $(this).data('country_id');
      var job_state_id = $(this).data('state_id');
      var job_city_id = $(this).data('city_id');

      
      $('#edit_job_id').val(jobid);
      $('#EditJobTitle').val(jobTitle);
      $('#EditjobDescription').val(jobDescription);
      $('#EditjobNumber').val(job_num_of_vacany);
      $('#EditjobExperience').val(job_experience);
      $('#Editskill_id').val(job_skill_required.split(','));  
      $('#EditjobWorkingHour').val(job_working_hour);
      $('#EditjobPostDate').val(job_posted_date);
      $('#EditjobCloseDate').val(job_closing_date);
      $('#EditjobContactEmail').val(ContactEmail);
      $('#EditjobCategory').val(job_category_id);
      $('#EditjobDepartment').val(job_department_id);

      $('#EditjobStatus').val(job_status).trigger('change');

      // Fetch the country list
      $.ajax({
        url: "/get_country", 
        type: 'GET',
        success: function(data) {
          $('#Editcount_id').empty();
          $('#Editcount_id').append('<option value="" disabled selected>-----Select Country-----</option>'); 
          $.each(data, function(index, country) {
            var selected = (country.country_id == job_country_id) ? 'selected' : ''; 
            $('#Editcount_id').append('<option value="' + country.country_id + '" ' + selected + '>' + country.country_name + '</option>');
          });

          $('#Editcount_id').val(job_country_id).trigger('change');
        }
      });

      $('#Editcount_id').change(function() {
        var countryId = $(this).val();
        $('#Editstate_id').empty().append('<option value="" disabled selected>-----Select State-----</option>');
        $('#Editcity_id').empty().append('<option value="" disabled selected>-----Select City-----</option>');
        
        if (countryId) {
          $.ajax({
            url: "/get_state", 
            type: "GET",
            data: { id: countryId },
            success: function(data) {
              $.each(data, function(index, state) {
                var selected = (state.state_id == job_state_id) ? 'selected' : ''; 
                $('#Editstate_id').append('<option value="' + state.state_id + '" ' + selected + '>' + state.state_name + '</option>');
              });

              $('#Editstate_id').val(job_state_id).trigger('change');
            }
          });
        }
      });

      $('#Editstate_id').change(function() {
        var stateId = $(this).val();
        $('#Editcity_id').empty().append('<option value="" disabled selected>-----Select City-----</option>');

        if (stateId) {
          $.ajax({
            url: '/get_city', 
            type: 'GET',
            data: { id: stateId },
            success: function(data) {
              $.each(data, function(index, city) {
                var selected = (city.city_id == job_city_id) ? 'selected' : ''; 
                $('#Editcity_id').append('<option value="' + city.city_id + '" ' + selected + '>' + city.city_name + '</option>');
              });
            }
          });
        }
      });

      // Set selected country, state, and city values
      $('#Editcount_id').val(job_country_id);
      $('#Editstate_id').val(job_state_id);
      $('#Editcity_id').val(job_city_id);



      $('#EditModel').modal('show');
    });
      

    
  
  });
  </script>


  </body>
  <!--end::Body-->
</html>
