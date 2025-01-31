@php 
$count = 1;
@endphp
<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> View Job Application</title>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 

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
              <div class="col-sm-6"><h3 class="mb-0">View Job Application</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item">Dashboard</li>
                  <li class="breadcrumb-item active" aria-current="page">View Job Application</li>
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
                            <td>Application ID</td>
                            <td>{{$record->app_id}}</td>
                        </tr>
                        <tr>
                            <td>Candidate Name</td>
                            <td>{{$record->candidate_name}}</td>
                        </tr>
                        <tr>
                            <td>Candidate Email</td>
                            <td>{{$record->candidate_email}}</td>
                        </tr>
                        <tr>
                            <td>Candidate Contact</td>
                            <td>{{$record->candidate_contact}}</td>
                        </tr>
                        <tr>
                            <td>Candidate Experience</td>
                            <td>{{$record->experince}}</td>
                        </tr>
                        <tr>
                            <td>Candidate Resume</td>
                            <td colspan="2">
                                <a href="{{asset('user/resume/'.$record->resume)}}">{{$record->resume}}</a>
                                <form method="post" action="{{route('DownloadResume')}}">
                                    @csrf
                                    <input type="hidden" name="filename" id="filename" value="{{$record->resume}}">
                                    <button class="btn btn-primary">Download Resume</button> 
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>Application Date</td>
                            <td>{{$record->application_date}}</td>
                        </tr>
                        <tr>
                            <td>Application Cover Message</td>
                            <td>{{$record->msg}}</td>
                        </tr>
                        <tr>
                            <td>Application Status</td>
                            <td>{{$record->application_status}}</td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center">
                               
                                <button class="EditStatus btn btn-primary" data-id="{{$record->app_id}}">Edit</button>
                                <a href="{{route('JobApplication')}}"><button class="btn btn-danger">Back</button></a>
                            </td>
                        </tr>
                    </table>
                </div>
                
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
          <!-- change Job application status Model --->
        <div class="modal fade" id="ApplyModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" id="ApplyUserForm"  action="{{ route('EditJobApplication') }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apply To This Job</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <input type="hidden" name="app_id" id="app_id">
                        <div class="modal-body">
                            <!-- Application Status -->
                            <div class="mb-3">
                                <label for="jobStatus">Application Status:</label>
                                <span class="error" style="color:red;">*</span>
                                <select class="form-control selectpicker" name="status" id="status">
                                    <option value="" disabled selected>-----Select Job Status-----</option>
                                    <option value="Viewed">Viewed</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Hired">Hired</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                                 <!-- Display Validation Error if Any -->
                                 @error('status')
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
    <script type="text/javascript">
        $(document).ready(function(){
           $('.EditStatus').click(function(e){
                e.preventDefault();
                var AppID = $(this).data('id');
                $('#app_id').val(AppID);

                $('#ApplyModel').modal('show');
           }); 
        });
    </script>
    
  </body>
  <!--end::Body-->
</html>
