<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>{{ $title }} | BlogApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="{{ asset("css/trix.css") }}">
    <script type="text/javascript" src="{{ asset("js/trix.js") }}"></script>
    <style>
      trix-toolbar [data-trix-button-group="file-tools"]{                      I
        display : none;
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">BlogApp</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="{{route('logout')}}" method="post">
        @csrf
        <button class='nav-link px-3 bg-dark border-0' style='cursor: pointer'><span data-feather="log-out" class="align-text-bottom"></span> Logout</button>
     </form>
      {{-- <a class="nav-link px-3" href="#">Sign out</a> --}}
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="{{ route('dashboard') }}">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/blogpost*')  || Request::is('dashboard/commnetmanagemnet*')  ? 'active' : '' }}" href="{{ route('blogpost.index') }}">
              <span data-feather="file" class="align-text-bottom"></span>
              MyBlogPost
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/user*') || Request::is('dashboard/changepassword*') ? 'active' : '' }}" href="{{ route('user.show', Auth::user()->username) }}">
              <span data-feather="file" class="align-text-bottom"></span>
              MyProfile
            </a>
          </li>
        </ul>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  
        @yield('content') 
    </main>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script>
      //documnet ready js
           $(document).ready(function() {
            toastr.options.timeOut = 5000;
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showEasing": "swing",
                "hideEasing": "linear", 
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
             }
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}', 'Success');
            @endif


        });
    </script>
      
  </body>
</html>
