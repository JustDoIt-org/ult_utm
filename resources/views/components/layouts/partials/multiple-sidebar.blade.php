@props(['title' => '', 'view' => 'guest', 'type' => 'layanan'])

@php
  switch ($type) {
      case 'ppid':
          # code...
          break;

      default:
          if ($view == 'guest') {
              $data = [
                  ['name' => 'Form Layanan', 'icon' => 'ni ni-single-copy-04 text-primary', 'link' => 'lt.home'],
                  ['name' => 'List Pengajuan', 'icon' => 'ni ni-single-copy-04 text-warning', 'link' => 'lt.list'],
                  ['name' => 'Riwayat Pengajuan', 'icon' => 'ni ni-book-bookmark text-success', 'link' => 'lt.riwayat'],
                  ['name' => 'Chat Admin', 'icon' => 'ni ni-chat-round text-success', 'link' => 'lt.chat_layanan'],
              ];
          } elseif ($view == 'admin_layanan') {
          } else {
          }
          break;
  }

@endphp

@if (!Route::is('lt.home') && !Route::is('lt.list') && !Route::is('lt.riwayat') && !Route::is('lt.chat_layanan'))
  @can('admin-layanan-terpadu index')
    @php
      $data = [
          ['name' => 'Dashboard', 'icon' => 'ni ni-tv-2 text-primary', 'link' => 'lt.dashboard'],
          ['name' => 'Riwayat Pengajuan', 'icon' => 'ni ni-book-bookmark text-success', 'link' => 'lt.admin_riwayat'],
      ];
    @endphp
  @endcan

  @can('layanan-terpadu index')
    @php
      $data = [
          ['name' => 'Dashboard', 'icon' => 'ni ni-tv-2 text-primary', 'link' => 'lt.dashboard'],
          ['name' => 'Riwayat Pengajuan', 'icon' => 'ni ni-book-bookmark text-success', 'link' => 'lt.admin_riwayat'],
          ['name' => 'List Chat', 'icon' => 'ni ni-chat-round text-success', 'link' => 'lt.chat_layanan_admin'],
          ['name' => 'List Layanan', 'icon' => 'ni ni-book-bookmark text-primary', 'link' => 'lt.list_layanan'],
          ['name' => 'Admin ULT', 'icon' => 'ni ni-single-02 text-primary', 'link' => 'lt.atur_admin_layanan'],
      ];
    @endphp
  @endcan
@endif



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/logo-silat-info.png') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.all.min.css') }}" />
  <title>
    {{ $title }}
  </title>

  <script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href=" {{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="{{ asset('assets/js/font-awesome42d5adcbca.js') }}" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  {{-- <script src="{{ asset('assets/js/plugins/flatpickr.min.js') }}"></script> --}}
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
  <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
  {{-- <link href="{{ asset('assets/DataTables/datatables.min.css') }}" rel="stylesheet"> --}}

  {{-- <script src="{{ asset('assets/DataTables/datatables.min.js') }}"></script> --}}
  <link rel="stylesheet" href="{{ asset('assets/css/dataTables.dataTables.css') }}">
  {{-- <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script> --}}

  <link rel="stylesheet" href="{{ asset('assets/css/buttons.bootstrap5.css') }}">



  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/dataTables.js') }}"></script>
  <script src="{{ asset('assets/js/dataTables.bootstrap5.js') }}"></script>
  <script src="{{ asset('assets/js/dataTables.buttons.js') }}"></script>
  <script src="{{ asset('assets/js/buttons.bootstrap5.js') }}"></script>
  <script src="{{ asset('assets/js/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/js/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/js/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assets/js/buttons.colVis.min.js') }}"></script>

  <style>
    .d-flex {
      gap: 20px;
    }

    .dropdown-container {
      display: flex;
      margin-top: 10px;
      gap: 25px;
      flex-direction: column;
      color: #37517e;
      background-color: #fff;
      position: absolute;
      top: 50px;
      border-radius: 10px;
      padding: 15px 15px 0 15px;
      /* max-height: 220px; */
      right: 30px;
      width: 150px;
      z-index: 9999;
      opacity: 0;
      visibility: hidden;
      transition: 0.3s ease all;
      box-shadow: 7px 20px 37px -11px rgba(0, 0, 0, 0.75);
      -webkit-box-shadow: 7px 20px 37px -11px rgba(0, 0, 0, 0.75);
      -moz-box-shadow: 7px 20px 37px -11px rgba(0, 0, 0, 0.75);
    }

    .icon-profile {
      width: 20px;
      height: 20px;
    }



    .dropdown-container.active {
      visibility: visible;
      opacity: 1;
    }

    .link-item {
      font-size: 15px;
      color: black;
    }
  </style>
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header bg-green-700">
      <a class=" m-0 d-flex justify-content-center bg-red-500" href="/">
        {{-- <img src="{{ asset('assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo"> --}}
        <img src="{{ asset('assets/img/logo-silat-info.png') }}" class="w-40 mt-3" alt="main_logo">
        {{-- <span class="ms-1 text-2xl font-weight-bold">{{ __('Silat Info') }}</span> --}}
      </a>
    </div>
    <hr class="horizontal dark mt-0">

    <ul class="navbar-nav">
      <?php
      foreach ($data as $key) {
        ?>
      <li class="nav-item">
        @if (Route::is($key['link']))
          <a class="nav-link" style="background-color: #5e72e4; border-radius: 10px; color: white !important;"
            href="{{ route($key['link']) }}">
          @else
            <a class="nav-link" href="{{ route($key['link']) }}">
        @endif
        <div
          class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="<?= $key['icon'] ?> text-sm opacity-10 {{ Route::is($key['link']) ? 'text-white' : '' }}"></i>
        </div>
        <span class="nav-link-text ms-1"><?= $key['name'] ?></span>
        </a>
      </li>
      <?php
      }
      ?>
    </ul>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
      data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            {{-- <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li> --}}
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">

          </ol>

        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <!-- <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span> -->
              <!-- <input type="text" class="form-control" placeholder="Type here..."> -->
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">

            {{-- <li class="nav-item pe-2 d-flex align-items-center">
              <a href="" class="nav-link text-white p-0 dropdown-toggle " id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="true">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none text-white">{{ Auth::user()->name }}</span>
              </a>


              <ul class="dropdown-menu dropdown-menu-end  px-2 py-3 me-sm-n4">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="/profile">
                    Profile
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="/">
                    Home
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="/logout">
                    Logout
                  </a>
                </li>

              </ul>
            </li> --}}
            <div class="d-flex align-items-center gap-2 cursor-pointer fs-2 font-weight-bold" id="avatar-dropdown">
              <img src="{{ asset('assets/img/profile-default.jpg') }}" width="36px" height="36px"
                class="rounded-circle cursor-pointer" alt="">
              <div class="font-semibold text-sm text-white">{{ Auth::user()->name }}</div>


              <div class="dropdown-container">
                <a href="{{ route('profile.edit') }}" class="link-item">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="icon-profile">
                    <path fill-rule="evenodd"
                      d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                      clip-rule="evenodd" />
                  </svg>
                  {{ __('Profile') }}
                </a>


                {{-- @can('layanan-terpadu index') --}}
                @can('admin-layanan-terpadu index')
                  <a href="{{ route('lt.dashboard') }}" class="link-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="icon-profile">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                    </svg>
                    {{ __('Dashboard') }}
                  </a>
                @endcan


                <form style=" font-size: 15px; margin-bottom: 5px;" method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a onclick="event.preventDefault(); this.closest('form').submit();" class="link-item">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                      class="icon-profile">
                      <path fill-rule="evenodd"
                        d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6ZM5.78 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 0 0 0 1.06l3 3a.75.75 0 0 0 1.06-1.06l-1.72-1.72H15a.75.75 0 0 0 0-1.5H4.06l1.72-1.72a.75.75 0 0 0 0-1.06Z"
                        clip-rule="evenodd" />
                    </svg>
                    {{ __('Log Out') }}
                  </a>
                </form>


              </div>
            </div>




            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="py-4">
      {{ $slot }}
    </div>
  </main>


  <script>
    $('#iconNavbarSidenav').on('click', (e) => {
      e.preventDefault()
      $('body').toggleClass('g-sidenav-pinned');
    })

    $('#avatar-dropdown').on('click', (e) => {
      $('.dropdown-container').toggleClass('active');
    })
  </script>

  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>

  <script>
    const Swal = require('sweetalert2')
  </script>


</body>


</html>
