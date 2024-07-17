@props(['title' => '', 'type' => 'layananTerpadu'])

<?php
if ($type == 'layananTerpadu') {
    $data = [['name' => 'Form Layanan', 'icon' => 'ni ni-single-copy-04 text-primary', 'link' => 'lt.home'], ['name' => 'Riwayat Pengajuan', 'icon' => 'ni ni-book-bookmark text-success', 'link' => 'lt.riwayat']];
} else {
    $data = [['name' => 'Dashboard', 'icon' => 'ni ni-tv-2 text-primary', 'link' => 'dashboard'], ['name' => 'List Order', 'icon' => 'ni ni-calendar-grid-58 text-warning', 'link' => 'list-order'], ['name' => 'Services', 'icon' => 'ni ni-single-copy-04 text-primary', 'link' => 'services'], ['name' => 'Metode Pembayaran', 'icon' => 'fa-solid fa-dollar-sign text-success', 'link' => 'payment-methods'], ['name' => 'FAQ', 'icon' => 'fa-solid fa-circle-question text-primary', 'link' => 'faq-admin'], ['name' => 'Tags', 'icon' => 'fa-solid fa-tag text-warning', 'link' => 'tags-admin'], ['name' => 'Portfolio', 'icon' => 'fa-solid fa-briefcase text-warning', 'link' => 'portfolio-admin'], ['name' => 'Chat', 'icon' => 'fa-solid fa-comments text-success', 'link' => 'chat-admin'], ['name' => 'Riwayat', 'icon' => 'fa-solid fa-history text-success', 'link' => 'riwayat-admin']];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>
    {{ $title }}
  </title>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href=" {{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <script src="{{ asset('assets/js/plugins/flatpickr.min.js') }}"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <link href="{{ asset('assets/DataTables/datatables.min.css') }}" rel="stylesheet">

  <script src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('assets/css/dataTables.dataTables.css') }}">
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.css">



  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="{{ asset('assets/js/pdfmake.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
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
      height: 120px;
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
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
        target="_blank">
        <img src="{{ asset('assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Dashboard</span>
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
    <!-- <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-50 mx-auto" src="assets/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
            <h6 class="mb-0">Need help?</h6>
            <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
          </div>
        </div>
      </div>
      <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
      <a class="btn btn-primary btn-sm mb-0 w-100" href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
    </div> -->
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
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="icon-profile">
                    <path fill-rule="evenodd"
                      d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                      clip-rule="evenodd" />
                  </svg>
                  {{ __('Profile') }}</a>
                <div class="link-item">
                  <form style="background: gray; height: 0px; font-size: 15px;" method="POST"
                    action="{{ route('logout') }}">
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
            </div>



            ==
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
  <script src="{{ asset('assets/js/core/popper.min.js') }} ></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}></script>
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}></script>

  <script>
    const Swal = require('sweetalert2')
  </script>


</body>


</html>
