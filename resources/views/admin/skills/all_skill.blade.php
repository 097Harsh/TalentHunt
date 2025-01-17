@php 
$count = 1;
@endphp
<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Manage Skills</title>
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
              <div class="col-sm-6"><h3 class="mb-0">Manager Skills</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item">Dashboard</li>
                  <li class="breadcrumb-item active" aria-current="page">Manage Skills</li>
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
                            <td>Skill ID</td>
                            <td>Skill Name</td>
                            <td>Action</td>
                            <td>
                                <button class="AddRecord btn btn-primary" style="float:right;">ADD</button>
                            </td>
                        </tr>
                        @foreach($skills as $skill)
                        <tr data-id="{{$skill->skill_id}}">
                            <td>{{$count++}}</td>
                            <td>{{$skill->skill_name}}</td>
                            <td colspan="2">
                              <button class="UpdateRecord btn btn-primary" data-id="{{$skill->skill_id}}" data-name="{{$skill->skill_name}}">Edit</button>
                              <button class="deleteRecord btn btn-danger" data-id="{{$skill->skill_id}}" data-name="{{$skill->skill_name}}" value="{{$skill->skill_id}}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                                 <!-- Pagination link-->
              <nav aria-label="..." style="float:right;">
                  <ul class="pagination" style="float:right;">
                    @if ($skills->onFirstPage())
                      <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                      </li>
                    @else
                      <li class="page-item">
                          <a class="page-link" href="{{ $skills->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                      </li>
                    @endif

                    @foreach ($skills->links()->elements[0] as $page => $url)
                      @if ($page == $skills->currentPage())
                          <li class="page-item active" aria-current="page">
                              <a class="page-link" href="#">{{ $page }}</a>
                          </li>
                      @else
                          <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                      @endif
                    @endforeach

                    @if ($skills->hasMorePages())
                      <li class="page-item">
                          <a class="page-link" href="{{ $skills->nextPageUrl() }}">Next</a>
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
                          <input type="hidden" name="user_id" id="user_id">
                          <h5>Are you sure you want to delete this skills?</h5>
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
                  <form action="{{ url('/InsertCourse') }}" method="post" id="AddUserForm">
                      @csrf
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Record</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <div class="modal-body">
                              <div class="mb-3 mt-3">
                                    <label for="name"> Skill Name:</label>
                                    <span class="error" style="color:red;">*</span>
                                    <input type="text" class="form-control" id="skill_name" name="skill_name" value="{{ old('course_name') }}" required />
                                  <!-- Display Validation Error if Any -->
                                  @error('course_name')
                                      <div class="text-danger">{{ $message }}</div>
                                  @enderror
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-danger">Yes, Add Course</button>
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
                <form action="" method="post" id="EditUserForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Hidden field to store course ID -->
                        <input type="hidden" name="edit_skill_id" id="edit_skill_id">
                        
                        <div class="modal-body">
                              <div class="mb-3 mt-3">
                                    <label for="name"> Skill Name:</label>
                                    <span class="error" style="color:red;">*</span>
                                     <!-- Pre-fill the course name input field -->
                                    <input type="text" class="form-control" id="edit_skill_name" name="edit_skill_name" value="{{ old('course_name') }}" required />
                                    <span class="text-danger">@error('course_name') {{$message}} @enderror</span>
                              </div>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes, Update Course</button>
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
            // Show the delete modal when clicking delete button
            $('.deleteRecord').click(function (e) {
                e.preventDefault();
                var user_id = $(this).data('id');  
                console.log("course_id:", user_id);
                //debugger;
                // Set the user_id value in the modal input
                $('#user_id').val(user_id);
                
                $('#deleteUserForm').attr('action', '/delete_skill/' + user_id);

                // Show the delete confirmation modal
                $('#deleteModel').modal('show');
            });

             // Show the Add modal when clicking Add button
             $('.AddRecord').click(function (e) {
                e.preventDefault();
                
                $('#AddUserForm').attr('action', '/InsertSkill/');

                // Show the delete confirmation modal
                $('#AddModel').modal('show');
            });
             // Show the Add modal when clicking Add button
            
             // Show the Edit modal when clicking Edit button
             $('.UpdateRecord').click(function (e) {
                e.preventDefault();
                var skillId = $(this).data('id');
                var skillName = $(this).data('name');
                console.log("id".skillId,"name".skillName);
                $('#edit_skill_id').val(skillId);  // Set skill ID in hidden input
                $('#edit_skill_name').val(skillName);  // Set skill name in input field
                
                $('#EditUserForm').attr('action', '/updatingRecord/' + skillId); // Set form action URL
                $('#EditModel').modal('show'); // Show the Edit modal
            });
        });
      </script>

  

  </body>
  <!--end::Body-->
</html>
