
<!DOCTYPE html>
<html lang="en">
    @php
    use App\Models\About;
    $about = About::latest()->first();
@endphp

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Portfolio</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('admin') }}/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{ asset('admin') }}/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('admin') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('admin') }}/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('admin') }}/images/image.png" />

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}">
                @if ($about && $about->image)
                    <img src="{{ asset('storage/' . $about->image) }}"
                        alt="Profile Logo"
                        style="height:40px; width:40px; object-fit:cover; border-radius:50%;">
                @else
                    <img src="{{ asset('admin') }}/images/logo.svg" alt="logo">
                @endif
            </a>


            <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}">
                @if ($about && $about->image)
                    <img src="{{ asset('storage/' . $about->image) }}"
                        alt="Profile Logo Mini"
                        style="height:32px; width:32px; object-fit:cover; border-radius:50%;">
                @else
                    <img src="{{ asset('admin') }}/images/logo-mini.svg" alt="logo">
                @endif
            </a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                <i class="mdi mdi-account-circle fs-3 me-2"></i>
                <span class="nav-profile-name">{{ auth()->user()->name ?? 'User' }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <form action="{{ route('logout') }}" method="POST" class="w-100">
                    @csrf
                    <button type="submit" class="dropdown-item d-flex align-items-center gap-2">
                        <i class="mdi mdi-logout text-primary"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>

          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('portfolio.index') }}">
            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
            <span class="menu-title">Portfolio</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('about.index') }}">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">About</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('resume.index') }}">
            <i class="mdi mdi-briefcase menu-icon"></i>
            <span class="menu-title">Resume</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('blog.index') }}">
            <i class="mdi mdi-blogger menu-icon"></i>
            <span class="menu-title">Blog</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('project.index') }}">
            <i class="mdi mdi-folder-star menu-icon"></i>
            <span class="menu-title">Projek</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contact.index') }}">
            <i class="mdi mdi-message menu-icon"></i>
            <span class="menu-title">Pesan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('skill.index') }}">
            <i class="mdi mdi-brain menu-icon"></i>
            <span class="menu-title">Skill</span>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('service.index') }}">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Service</span>
            </a>
          </li> --}}
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">

                    @yield('konten')
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © Guzhao </a>2026</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"></a> Portfolio</span>
        </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('admin') }}/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('admin') }}/vendors/chart.js/Chart.min.js"></script>
  <script src="{{ asset('admin') }}/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{ asset('admin') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('admin') }}/js/off-canvas.js"></script>
  <script src="{{ asset('admin') }}/js/hoverable-collapse.js"></script>
  <script src="{{ asset('admin') }}/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('admin') }}/js/dashboard.js"></script>
  <script src="{{ asset('admin') }}/js/data-table.js"></script>
  <script src="{{ asset('admin') }}/js/jquery.dataTables.js"></script>
  <script src="{{ asset('admin') }}/js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->

  <script src="{{ asset('admin') }}/js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>
