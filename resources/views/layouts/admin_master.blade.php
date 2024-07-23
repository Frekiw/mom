
<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset ('admin/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset ('admin/assets/img/favicon.png')}}">
  <link rel="apple-touch-icon" sizes="76x76" href="https://maxiidea.com/img/icon.png">
  <link rel="icon" type="image/png" href="https://maxiidea.com/img/icon.png">
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('admin/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{ asset('admin/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset ('admin/assets/css/material-dashboard.css?v=3.1.0')}}" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <!-- Bootstrap 5 CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <!-- DataTables Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
  <!-- DataTables ColReorder CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.5.4/css/colReorder.bootstrap5.min.css">
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <style>
    button.blogout{
        background: none !important;
        border: none !important;
        color: white !important;
    }
    .nav-link.active.bg-warning {
      background-color: #ffc107; /* Warna kuning untuk background */
    }
  </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside
          class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
          id="sidenav-main">
          <div class="sidenav-header">
              <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                  aria-hidden="true" id="iconSidenav"></i>
              <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
                  target="_blank">
                  <img src="{{asset ('admin/assets/img/logomaxid.png')}}" class="navbar-brand-img h-100" alt="main_logo">
              </a>
          </div>
          <hr class="horizontal light mt-0 mb-2">
          <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link text-white {{ request()->is('dashboard') ? 'active bg-warning' : '' }}" href="/dashboard">
                          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                              <i class="material-icons opacity-10">dashboard</i>
                          </div>
                          <span class="nav-link-text ms-1">Dashboard</span>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white  {{ request()->is('dashboard/stmeetings') ? 'active bg-warning' : '' }}" href="/dashboard/stmeetings">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Company Meeting</span>
                    </a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link text-white  {{ request()->is('dashboard/meetings*') || request()->is('dashboard/meetings/create*') || request()->is('dashboard/meetings/edit*') ? 'active bg-warning' : '' }}" href="/dashboard/meetings">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Minutes Of Meeting</span>
                    </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white  {{ request()->is('dashboard/users') ? 'active bg-warning' : '' }}" href="/dashboard/users">
                      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                          <i class="material-icons opacity-10">table_view</i>
                      </div>
                      <span class="nav-link-text ms-1">User Management</span>
                  </a>
              </li>
                <li class="nav-item">
                  <a class="nav-link text-white  {{ request()->is('dashboard/tncs*') || request()->is('dashboard/tncs/edit*') ? 'active bg-warning' : '' }}" href="/dashboard/tncs">
                      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                          <i class="material-icons opacity-10">table_view</i>
                      </div>
                      <span class="nav-link-text ms-1">Terms And Condition</span>
                  </a>
              </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ route ('profile.show') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                  <form class="nav-link" method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="blogout text-center d-flex align-items-center justify-content-center">
                              <i class="fa fa-sign-out opacity-10 me-2"></i>
                          <span class="nav-link-text ms-1 fw-lighter">Sign Out</span>
                      </button>
                  </form>
              </li>
              <li class="nav-item pt-8">
                <a class="nav-link text-white " href="javascript:void(0)">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="{{ Auth::user()->profile_photo_url }}" class="rounded-cicrcle" style="border-radius:500px;width: 40px; height:40px; ">
                    </div>
                    <span class="nav-link-text ms-1">{{ Auth::user()->name}}</span>
                </a>
              </li>
              </ul>
              
          </div>
      </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " style="overflow-x: hidden;">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

@yield('admincontent')