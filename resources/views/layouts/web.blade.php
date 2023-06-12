<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    {{-- <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>@yield('title')</title>
    
</head>
<body>
    <div class="bg-gray">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ url('admin/dashboard') }}">Project WebPro</a>
            <!-- Sidebar Toggle-->
            <!-- Navbar Search-->
            <div class="input-group"></div>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                                <a class="nav-link {{ Request::path() === 'admin/dashboard' ? 'btn-primary text-white' : '' }}" href="{{ url('admin/dashboard') }}">
                                <i class="bi bi-house {{ Request::path() === 'admin/dashboard' ? 'text-white' : '' }}"></i>
                                <span class="px-2">Dashboard</span>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link {{ request()->is('admin/MyPortfolio*') ? 'active active-nav' : '' }}" href="{{ route('MyPortfolio.index') }}">
                                <i class="bi bi-person {{ request()->is('admin/MyPortfolio*') ? 'active-nav' : '' }}"></i>
                                <span class="px-2">Biodata</span>
                            </a>
                            <a class="nav-link {{ request()->is('admin/Category*') ? 'active active-nav' : '' }}" href="{{ route('Category.index') }}">
                                <i class="bi bi-bookmark {{ request()->is('admin/Category*') ? 'active-nav' : '' }}"></i>
                                <span class="px-2">Category</span>
                            </a>
                            <a class="nav-link {{ request()->is('admin/Skill*') ? 'btn-primary text-white' : '' }}" href="{{ route('Skill.index') }}">
                                <i class="bi bi-code {{ request()->is('admin/Skill*') ? 'text-white' : '' }}"></i>
                                <span class="px-2">Skill</span>
                            </a>
                            <a class="nav-link {{ request()->is('admin/Education*') ? 'btn-primary text-white' : '' }}" href="{{ route('Education.index') }}">
                                <i class="bi bi-mortarboard {{ request()->is('admin/Education*') ? 'text-white' : '' }}"></i>
                                <span class="px-2">Education</span>
                            </a>
                            <a class="nav-link {{ request()->is('admin/Subject*') ? 'btn-primary text-white' : '' }}" href="{{ route('Subject.index') }}">
                                <i class="bi bi-book {{ request()->is('admin/Subject*') ? 'text-white' : '' }}"></i>
                                <span class="px-2">Subject</span>
                            </a>
                            <a class="nav-link {{ request()->is('admin/Interest*') ? 'btn-primary text-white' : '' }}" href="{{ route('Interest.index') }}">
                                <i class="fa-solid fa-person-running  {{ request()->is('admin/Interest*') ? 'text-white' : '' }}"></i>
                                <span class="px-2">Interest</span>
                            </a>
                            <a class="nav-link {{ request()->is('admin/Contact*') ? 'btn-primary text-white' : '' }}" href="{{ route('Contact.index') }}">
                                <i class="bi bi-telephone  {{ request()->is('admin/Contact*') ? 'text-white' : '' }}"></i>
                                <span class="px-2">Contact</span>
                            </a>
                            <a class="nav-link {{ request()->is('admin/Message*') ? 'btn-primary text-white' : '' }}" href="{{ route('Message.index') }}">
                                <i class="bi bi-envelope  {{ request()->is('admin/Message*') ? 'text-white' : '' }}"></i>
                                <span class="px-2">Message</span>
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ Auth::user()->name }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                @stack('js')
                <footer class="py-4 sb-sidenav-dark text-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Michael A.K. 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

        

      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script src="{{ asset('assets/js/scripts.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
      <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
      <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
      <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
      <script src="{{ asset('assets/js/datatables-simple-demo.js') }}"></script>
      <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
      <script>
        let table = new DataTable('.datatables');
      </script>
      @yield('js')
</body>
</html>
