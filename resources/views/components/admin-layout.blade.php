<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? ''}}</title>

    {{-- <link rel="shortcut icon" href="{{ asset('img/admin/info/'.$info->logo_brand)}}" type="image/x-icon"> --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template/mazer/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{ asset('template/mazer/vendors/simple-datatables/style.css')}}">

    <link rel="stylesheet" href="{{ asset('template/mazer/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{ asset('template/mazer/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    {{-- font --}}
    <link rel="stylesheet" href="{{ asset('template/mazer/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('template/mazer/vendors/fontawesome/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template/mazer/css/app.css')}}">

        <script src="{{ asset('vendor/sweetalert/sweetalert.min.js')}}"></script>
        <script src="{{ asset('vendor/sweetalert/sweetalert2.css')}}"></script>

    {{-- @if ($select)
        <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{ asset('template/admin/lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    @endif --}}

    {{ $head ?? '' }}
    <style>
         .button-hover {
                display: none;
            }
        .area-hover:hover .button-hover{
            display: block;
        }
    </style>
</head>

<body style="font-family: Arial, Helvetica, sans-serif">
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header py-0">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{ url('/dashboard') }}"><img src="https://i.ibb.co/3Mws0db/favicon.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="{{ url('/dashboard') }}" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
               <x-menu/>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header>
                <nav class="navbar navbar-expand navbar-light px-0">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                {{-- <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Notifications</h6>
                                        </li>
                                        <li><a class="dropdown-item">No notification available</a></li>
                                    </ul>
                                </li> --}}
                                <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle dropend" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-info-square bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Kingdom</h6>
                                        </li>
                                        <li class="ps-3"><a class="dropdown-item small" href="{{ url('orang?s=peta') }}">Peta Orang</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle dropend" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-plus-square bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Kingdom</h6>
                                        </li>
                                        <li class="ps-3"><a class="dropdown-item small" href="{{ url('orang/create') }}">Tambah Orang</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3 d-none d-sm-block">
                                            <h6 class="mb-0 text-gray-600">{{ $user->name }}</h6>
                                            <p class="mb-0 text-sm text-gray-600">{{ $user->level }}</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{ asset('img/profil.jpg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hallo, {{ $user->name }}</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ url('kalender') }}"><i class="icon-mid bi bi-calendar me-2"></i> Kalender</a></li>
                                    <li><a class="dropdown-item" href="{{ url('user/'.Crypt::encryptString($user->id).'/edit') }}"><i class="icon-mid bi bi-gear me-2"></i>
                                            Pengaturan Akun</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li class="text-end">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger btn-sm me-3">Keluar <i class="bi bi-box-arrow-right"></i></button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content" class="px-0 pt-0">
                {{ $content ?? ''}}
                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>{{ Universal::ambil_tahun() }} &copy; Chatomz Company</p>
                        </div>
                        <div class="float-end">
                            <p>Created by Firman Chatomz</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="{{ asset('template/mazer/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('template/mazer/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('template/mazer/js/bootstrap.bundle.min.js')}}"></script>
    

    <script src="{{ asset('template/mazer/vendors/fontawesome/all.min.js')}}"></script>

    <script src="{{ asset('template/mazer/js/main.js')}}"></script>

        <script src="{{ asset('template/mazer/vendors/simple-datatables/simple-datatables.js')}}"></script>
        <script>
            // Simple Datatable
            let table1 = document.querySelector('#example1');
            let dataTable = new simpleDatatables.DataTable(table1);
        </script>

    {{-- js chatomz custom --}}
    <script src="{{ asset('js/chatomz.js')}}"></script>

    {{-- @if ($select)
        <script src="{{ asset('template/admin/lte/plugins/select2/js/select2.full.min.js')}}"></script>
        <script>
            $(function () {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            });
        </script>
    @endif --}}
    {{ $kodejs ?? '' }}
   
</body>

</html>