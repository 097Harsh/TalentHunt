<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{route('dashboard')}}" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{asset('admin/assets/img/logo.png')}}"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">TalentHunt </span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        @if(Auth::user()->role_id == 1)
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false">
                <li class="nav-item ">
                    <a href="{{route('dashboard')}}" class="nav-link ">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>
                        Dashboard
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ManagerUsers')}}" class="nav-link">
                    <i class="nav-icon bi bi-people-fill"></i>
                    <p>Manage Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ManagerCompnies')}}" class="nav-link">
                    <i class="nav-icon bi bi-building"></i>
                    <p>Manage Companies</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ManageCourse')}}" class="nav-link">
                    <i class="nav-icon bi bi-mortarboard"></i>
                    <p>Manage Courses</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ManageSkills')}}" class="nav-link">
                    <i class="nav-icon bi bi-lightbulb"></i>
                    <p>Manage Skills</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('MangeJobs')}}" class="nav-link">
                    <i class="nav-icon bi bi-lightbulb"></i>
                    <p>Manage Jobs</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('Job-Applications')}}" class="nav-link ">
                    <i class="nav-icon bi bi-archive"></i>
                    <p>
                        Manage Job Application
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ManageJobCategory')}}" class="nav-link">
                    <i class="nav-icon bi bi-list"></i>
                    <p>Manage Job Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ManageJobDepartment')}}" class="nav-link">
                    <i class="nav-icon bi bi-list"></i>
                    <p>Manage Job Department</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('AllInterview')}}" class="nav-link ">
                    <i class="nav-icon bi bi-calendar-check"></i>
                    <p>
                        View Interviews
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ViewFeedBack')}}" class="nav-link">
                    <i class="nav-icon bi bi-chat-square-dots"></i>
                    <p>View Feedback</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ViewContact')}}" class="nav-link">
                    <i class="nav-icon bi bi-chat-square-dots"></i>
                    <p>View Contact inqury</p>
                    </a>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        @elseif(Auth::user()->role_id == 3)
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false">
                <li class="nav-item ">
                    <a href="{{route('CompanyDashboard')}}" class="nav-link ">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>
                        Dashboard
                    </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('MangeJob')}}" class="nav-link ">
                    <i class="nav-icon bi bi-briefcase"></i>
                    <p>
                        Manage Jobs
                    </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('JobApplication')}}" class="nav-link ">
                    <i class="nav-icon bi bi-archive"></i>
                    <p>
                        Manage Job Application
                    </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('ManageInterview')}}" class="nav-link ">
                    <i class="nav-icon bi bi-calendar-check"></i>
                    <p>
                        Manage Interviews
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('CompanyFeedback')}}" class="nav-link ">
                    <i class="nav-icon bi bi-chat-left-text"></i>
                    <p>
                        Give Feedback
                    </p>
                    </a>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        @endif
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->