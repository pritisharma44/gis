<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Global Industrial Solution</title>

    <!-- theme meta -->
    <meta name="theme-name" content="mono" />

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{ url('assets/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ url('assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />

    <link href="{{ url('assets/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}"
        rel="stylesheet" />

    <link href="{{ url('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />

    <link href="{{ url('assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <link href="{{ url('assets/plugins/toaster/toastr.min.css" rel="stylesheet') }}" />

    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{ url('assets/css/style.css') }}" />

    <link id="main-css" rel="stylesheet" href="{{ url('assets/css/custom.css') }}" />
    
    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- FAVICON -->
    <link href="{{ url('assets/images/favicon.png') }}" rel="shortcut icon" />


    <script src="{{ url('assets/plugins/nprogress/nprogress.js') }}"></script>
</head>

<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <div id="toaster"></div>

    <div class="wrapper">

        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="/index.html">
                        <img src="{{ url('assets/images/logo.png') }}" alt="Mono">
                        <span class="brand-name"></span>
                    </a>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-left" data-simplebar style="height: 100%;">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        @if (NavBar() == null)
                            <script>
                                location.reload();
                            </script>
                        @endif
                        @foreach (NavBar() as $value)
                        <?php $arrSubroute = explode(',', $value['permission']['sub_route']); ?>
                        @if ($value['permission']['parent_menu_id'] == 'no' && $value['permission']['key'] != 'settings')
                        <li class="<?php if (in_array(\Request::route()->getName(), $arrSubroute)) {
                            echo 'active';
                        } ?>">
                                <a class="sidenav-item-link" href="{{ route($value['permission']['route']) }}">
                                    <i class="{{ $value['permission']['icon'] }}"></i>
                                    <span class="nav-text">{{ $value['permission']['name'] }}</span>
                                </a>
                            </li>
                        @endif

                        @if ($value['permission']['parent_menu_id'] == 'yes')
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#users" aria-expanded="false" aria-controls="users">
                                <i class="mdi mdi-account"></i>
                                <span class="nav-text">Users</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="users" data-parent="#sidebar-menu">
                                <div class="sub-menu">

                                    <li>
                                        <a class="sidenav-item-link" href="user-activities.html">
                                            <span class="nav-text">Customers</span>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="user-activities.html">
                                            <span class="nav-text">Sub Admins</span>

                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        @endif
                        @endforeach

                    </ul>

                </div>

                <div class="sidebar-footer">
                    <div class="sidebar-footer-content">
                        <ul class="d-flex">
                            <li>
                                <a href="user-account-settings.html" data-toggle="tooltip"
                                    title="Profile settings"><i class="mdi mdi-settings"></i></a>
                            </li>
                            {{-- <li>
                                <a href="#" data-toggle="tooltip" title="No chat messages"><i
                                        class="mdi mdi-chat-processing"></i></a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- ====================================
          ——— PAGE WRAPPER
          ===================================== -->
        <div class="page-wrapper">

            <!-- Header -->
            <header class="main-header" id="header">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>

                    {{-- <span class="page-title">Admin Panel</span> --}}

                    <div class="navbar-right ">

                        <ul class="nav navbar-nav">
                          
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="{{url('assets/images/user/user-xs-01.jpg')}}" class="user-image rounded-circle"
                                        alt="User Image" />
                                    <span class="d-none d-lg-inline-block">John Doe</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-link-item" href="user-profile.html">
                                            <i class="mdi mdi-account-outline"></i>
                                            <span class="nav-text">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-link-item" href="email-inbox.html">
                                            <i class="mdi mdi-lock"></i>
                                            <span class="nav-text">Change Password</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-link-item" href="user-activities.html">
                                            <i class="mdi mdi-diamond-stone"></i>
                                            <span class="nav-text">Activitise</span></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-link-item" href="user-account-settings.html">
                                            <i class="mdi mdi-settings"></i>
                                            <span class="nav-text">Account Setting</span>
                                        </a>
                                    </li>

                                    <li class="dropdown-footer">
                                        <a class="dropdown-link-item" href="{{route('logout')}}"> <i
                                                class="mdi mdi-logout"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>


            @yield('content')

            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p style="text-align: center">
                        &copy; <span id="copy-year"></span> Copyright Global Industrial Solution.
                    </p>
                </div>
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>

        </div>
    </div>

    <script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/plugins/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ url('assets/https://unpkg.com/hotkeys-js/dist/hotkeys.min.js') }}"></script>

    <script src="{{ url('assets/plugins/apexcharts/apexcharts.js') }}"></script>

    <script src="{{ url('assets/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ url('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ url('assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ url('assets/plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>

    <script src="{{ url('assets/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ url('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('input[name="dateRange"]').daterangepicker({
                autoUpdateInput: false,
                singleDatePicker: true,
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
                jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
            });
            jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
                jQuery(this).val('');
            });
        });
    </script>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script src="{{ url('assets/plugins/toaster/toastr.min.js') }}"></script>

    <script src="{{ url('assets/js/mono.js') }}"></script>
    <script src="{{ url('assets/js/chart.js') }}"></script>
    <script src="{{ url('assets/js/map.js') }}"></script>
    <script src="{{ url('assets/js/custom.js') }}"></script>

</body>

</html>
