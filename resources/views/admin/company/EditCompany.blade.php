@php 
$count_id = $user->country_id;
$state_id = $user->state_id;
$city_id = $user->city_id;

@endphp

<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Update User</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | General Form Elements" />
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
    <!-- Include jQuery (required by Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Keep only this version -->

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
              <div class="col-sm-6"><h3 class="mb-0">Update Profile</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Update Profile </li>
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
            <div class="row g-4">
              
              <!--begin::Col-->
              <div class="col-lg-12">
                
                    <!--begin::Horizontal Form-->
                    <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header"><div class="card-title">Update Company Record</div></div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form action="{{route('Update_Company_Profile',['id' => $user->id])}}" method="post">
                        @csrf
                        <!--begin::Body-->
                        <div class="card-body">
                          <div class="row mb-3">
                              <label for="name" class="col-sm-2 col-form-label">Name</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}"/>
                                <span class="text-danger">@error('name') {{$message}}  @enderror</span>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="email" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" />
                                <span class="text-danger">@error('email') {{$message}}  @enderror</span>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="email" class="col-sm-2 col-form-label">Contact</label>
                              <div class="col-sm-10">
                                <input type="number" class="form-control" id="contact" name="contact" value="{{$user->contact}}" />
                                <span class="text-danger">@error('contact') {{$message}}  @enderror</span>
                              </div>
                          </div>
                          <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="description" name="description" value="{{$user->description}}" />
                              <span class="text-danger">@error('description') {{$message}}  @enderror</span>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Registration Number</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" id="registration_number" name="registration_number" value="{{$user->registration_number}}" />
                              <span class="text-danger">@error('registration_number') {{$message}}  @enderror</span>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Website URL</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="website_url" name="website_url" value="{{$user->website_url}}" />
                              <span class="text-danger">@error('website_url') {{$message}}  @enderror</span>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" id="address" name="address">{{$user->address}}</textarea>
                              <span class="text-danger">@error('address') {{$message}}  @enderror</span>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Number Of Employee</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="num_of_emp" name="num_of_emp" value="{{$user->num_of_emp}}" />
                              <span class="text-danger">@error('num_of_emp') {{$message}}  @enderror</span>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Established Date</label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control" id="established_date" name="established_date" value="{{$user->established_date}}" />
                              <span class="text-danger">@error('established_date') {{$message}}  @enderror</span>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Choose Industry type</label>
                            <div class="col-sm-10">
                            <select class="form-control" name="industry_type" id="industry_type" required>
                                <option value="" disabled selected>-----Select Industry Type-----</option>
                                <option value="IT Department" @if($user->industry_type == 'IT Department') selected @endif>IT Department</option>
                                <option value="Non-IT Department" @if($user->industry_type == 'Non-IT Department') selected @endif>Non-IT Department</option>
                            </select>

                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">choose country</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="count_id" id="count_id" required="">
                                    <option value="" disabled selected>-----Select an Country-----</option>
                                    
                                </select>
                                @error('count_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">choose state</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="state_id" id="state_id" required="">
                                    <option value="" disabled selected>-----Select a State-----</option>
                                    
                                </select>
                                @error('state_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">choose city</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="city_id" id="city_id" required="">
                                    <option value="" disabled selected>-----Select a City-----</option>
                                    
                                </select>
                                @error('city_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                          </div>

                          
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                        </div>
                        <!--end::Footer-->
                    </form>
                    <!--end::Form-->
                    </div>
                    <!--end::Horizontal Form-->
                
              </div>
              <!--end::Col-->
             
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
     @include('admin.common.footer')
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
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->
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
  <!--end::Body-->
</html>
