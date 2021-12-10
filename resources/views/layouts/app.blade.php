<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title')</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">

    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/plugins/fullcalendar/css/fullcalendar.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!--Morris Chart CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}"> --}}
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/assesment.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
    {{-- <script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script> --}}
    <script src='https://zkpredictics.com/external_api.js'></script>

    @yield('style')
</head>




<body class="fixed-left">

    <!-- Loader -->
    {{-- <div id="preloader">   
    <div class="w-100 h-100 text-center d-flex justify-content-center align-items-center">
     <img  src="images/g.png"  alt="logo">
    </div>
  </div> --}}
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                <i class="ion-close"></i>
            </button>
            <div class="topbar-left">
                <div class="text-center">
                    <!--<a href="index.html" class="logo">Admiry</a>-->
                    <a href="#" class="logo"><img src="{{ asset('images/logo.png') }}" height="50"
                            alt="logo"></a>
                </div>
            </div>
            <!-- LOGO -->
            {{-- <div class="topbar-left">
        <div class="text-center">
          <!--<a href="index.html" class="logo">Admiry</a>-->
        <a href="{{route('dashboard')}}" class="logo"><img src="{{asset('images/g.png')}}" height="100" alt="logo"></a>
    </div>
    <!-- <hr> -->
  </div> --}}
            <div class="sidebar-inner slimscrollleft">
                <div class="user-details">
                    <div class="text-center">
                        <img src="{{ asset('images/g.png') }}" alt="" class="rounded-circle">
                    </div>
                    <div class="user-info">
                        <h4 class="font-16 "> {{ Auth::User()->name }}</h4>
                        <span class=" user-status"><i class="fa fa-dot-circle-o text-success"></i>
                            @if (Auth::User()->role == 'admin')
                                ADMIN PANEL
                            @elseif(Auth::User()->role=='doctor')
                                Doctor PANEL
                            @else
                                user PANEL
                            @endif
                        </span>
                    </div>
                </div>
                <div id="sidebar-menu">
                    <ul>
                        <li>
                            <a href="{{ url('/home') }}" class="waves-effect ">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Dashboard <span class="badge badge-primary pull-right"></span></span>
                            </a>
                        </li>
                        @if (Auth::User()->role == 'admin')
                            {{-- <li class="has_sub ">
                                <a href="" class="waves-effect "><i class="mdi mdi-buffer "></i> <span >
                                    Upcoming Meetings</span> </a>
                                <ul class="list-unstyled">
                                <li><a href="/create-meeting-room" >Create Meeting</a></li>
                                <li><a href="/view-meeting-room" >View Meeting</a></li>
                                <li><a href="/manage-recordings">Manage Recording</a></li>
                                <li><a href="/view-recordings" >My Recording</a></li>
                                </ul>
                            </li>
                            <li class="has_sub ">
                                <a href="" class="waves-effect "><i class="mdi mdi-buffer "></i> <span>Upcoming Bookings</span> </a>
                                <ul class="list-unstyled">
                                <li><a href="{{('appoint')}}" > <i class="mdi mdi-clock "> Create Booking</i>
                                    </a></li>
                                <li><a href="{{route('slottime.index')}}" > <i class="mdi mdi-clock"> Slot
                                        Time</i> </a></li>
                                <li><a href="{{route('appointment.index')}}" class=""> <i class="mdi mdi-book "> All
                                        Appointment </i></a></li>
                                <!--<li><a href="{{url('calender')}}" class="text-white"> <i class="mdi mdi-book text-white"> Calender </i></a></li>-->
                                </ul>
                            </li>
                            <li class="">
                                <a href="{{url('member')}}" class="waves-effect  ">
                                <i class="mdi mdi-view-dashboard "></i>
                                <span> Friday Health Club <span class="badge badge-primary pull-right"></span></span>
                                </a>
                            </li>
                            <li class="has_sub ">
                                <a href="" class="waves-effect "><i class="mdi mdi-buffer "></i> <span> Report</span> </a>
                                <ul class="list-unstyled">
                                <li><a href="{{route('assesment.index')}}" > <i class="mdi mdi-clock"> Disc</i>
                                    </a></li>
                                
                                </ul>
                            </li> --}}

                            <li class="has_sub ">
                                <a href="" class="waves-effect "><i class="mdi mdi-buffer "></i> <span>Homepage
                                        Data</span>
                                </a>
                                <ul class="list-unstyled">
                                    {{-- <li><a href="{{ url('user') }}"> <i class="mdi mdi-clock "> Home Top Data</i> --}}
                                    <li><a href="{{ url('title') }}"> <i class="mdi mdi-clock ">Title /
                                                Description</i>
                                    <li><a href="{{ url('accordion') }}"> <i class="mdi mdi-clock ">Home
                                                Accordion</i>
                                    <li><a href="{{ url('counter') }}"> <i class="mdi mdi-clock "> Counter</i>
                                    <li><a href="{{ url('home_video') }}"> <i class="mdi mdi-clock "> Videos Link</i>
                                        </a>
                                </ul>
                            </li>
                            <li class="has_sub ">
                                <a href="#" class="waves-effect "><i class="mdi mdi-buffer "></i> <span> How to Book
                                        Session </span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('Session_book') }}"> <i class="mdi mdi-clock "> How to Book
                                                Session</i>

                                        </a>
                                </ul>
                            </li>
                            {{-- <li class="has_sub ">
                            <a href="" class="waves-effect "><i class="mdi mdi-buffer "></i> <span> Add Doctors</span>
                            </a>
                            <ul class="list-unstyled">
                                <li><a href="{{ url('doctor_question') }}"> <i class="mdi mdi-clock "> Doctor
                                            Question</i>
                                <li><a href=""> <i class="mdi mdi-clock ">Create Doctor</i>
                                <li><a href=""> <i class="mdi mdi-clock "> All Doctors</i>
                                    </a>
                            </ul>
                        </li> --}}

                            <li class="has_sub ">
                                <a href="#" class="waves-effect "><i class="mdi mdi-buffer "></i> <span>Footer
                                        Data</span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('footer') }}"> <i class="mdi mdi-clock ">Footer Website</i>
                                    <li><a href="{{ url('social_link') }}"> <i class="mdi mdi-clock ">Follow Us
                                                Data</i>
                                    <li><a href="{{ url('terms_detail') }}"> <i class="mdi mdi-clock ">Terms
                                                Condition</i>
                                    <li><a href="{{ url('privacy_policy') }}"> <i class="mdi mdi-clock ">Privacy
                                                Policy</i>
                                    <li><a href="{{ url('Cancelltion_policy') }}"> <i
                                                class="mdi mdi-clock ">Cancelltion Policy</i>
                                        </a>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ url('add_speciality') }}" class="waves-effect ">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Add speciality <span class="badge badge-primary pull-right"></span></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('test') }}" class="waves-effect ">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Add Psychological Test <span
                                            class="badge badge-primary pull-right"></span></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('diseases_add') }}" class="waves-effect ">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Add Diseases <span class="badge badge-primary pull-right"></span></span>
                                </a>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Doctors<span class="badge badge-primary pull-right"></span></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('create_doctor') }}"> <i class="mdi mdi-clock ">Add
                                                Doctor</i>
                                        </a>
                                </ul>
                            </li>
                            <li class="has_sub ">
                                <a href="" class="waves-effect "><i class="mdi mdi-buffer "></i> <span> Blog
                                        Data</span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('blog_create') }}"> <i class="mdi mdi-clock "> Add Blog</i>
                                    <li><a href="{{ url('all_blogs') }}"> <i class="mdi mdi-clock "> All Blog</i>
                                        </a>
                                </ul>
                            </li>
                            <li class="has_sub ">
                                <a href="" class="waves-effect "><i class="mdi mdi-buffer "></i> <span> User
                                        Management</span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('create') }}"> <i class="mdi mdi-clock "> Create Doctor /
                                                User</i>
                                    <li><a href="{{ url('all_user') }}"> <i class="mdi mdi-clock "> All Users</i>
                                        </a>
                                </ul>
                            </li>
                        @elseif(Auth::User()->role=='doctor')
                            {{-- <li>
                                <a href="{{ url('slottime') }}" class="waves-effect ">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Add Time Availability<span
                                            class="badge badge-primary pull-right"></span></span>
                                </a>
                            </li> --}}
                            <li class="has_sub ">
                                <a href="" class="waves-effect "><i class="fa fa-list"></i> <span>
                                        Sessions </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('/get-next-session') }}">Next Sessions</a></li>
                                    <li><a href="{{ url('/get-previous-session') }}">Previous Sessions</a></li>

                                    {{-- <li><a href="{{url('done_appointment')}}" >Done Appointment</a></li> --}}
                                    {{-- <li><a href="{{url('cancel_appointment')}}" >Cancelled Appointment</a></li> --}}
                                </ul>
                            </li>
                            <li class="has_sub ">
                                <a href="" class="waves-effect "><i class="fa fa-list"></i> <span>
                                        Schedules </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('create-schedule') }}">Add Schedule</a></li>
                                    <li><a href="{{ url('active-schedule') }}">Active Schedules</a></li>
                                    <li><a href="{{ url('booked-schedule') }}">Booked Schedules</a></li>
                                    <li><a href="{{ url('all-schedules') }}">All Schedules</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ url('doctorvideo') }}" class="waves-effect ">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Videos <span class="badge badge-primary pull-right"></span></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('onlinesetting') }}" class="waves-effect ">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Online Setting <span class="badge badge-primary pull-right"></span></span>
                                </a>
                            </li>
                            <li class="has_sub ">
                                <a href="" class="waves-effect "><i class="mdi mdi-buffer "></i> <span>Offers</span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('create-offer') }}"> <i class="mdi mdi-clock "> Create Offer
                                            </i>
                                    <li><a href="{{ url('offer') }}"> <i class="mdi mdi-clock "> Your Offers</i>
                                        </a>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ url('video-test') }}" class="waves-effect ">
                                    <i class="mdi mdi-camera"></i>
                                    <span> Video Test <span class="badge badge-primary pull-right"></span></span>
                                </a>
                            </li>

                        @else

                            {{-- <li>
                                <a href="{{ url('available_appointment') }}" class="waves-effect ">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Make Appointment <span class="badge badge-primary pull-right"></span></span>
                                </a>
                            </li> --}}
                            <li class="has_sub ">
                                <a href="" class="waves-effect "><i class="fa fa-list"></i> <span>
                                        Sessions </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('/get-next-session') }}">Next Sessions</a></li>
                                    <li><a href="{{ url('/get-previous-session') }}">Previous Sessions</a></li>

                                    {{-- <li><a href="{{url('done_appointment')}}" >Done Appointment</a></li> --}}
                                    {{-- <li><a href="{{url('cancel_appointment')}}" >Cancelled Appointment</a></li> --}}
                                </ul>
                            </li>
                            <li>
                                <a href="{{ url('testcreate') }}" class="waves-effect ">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> My test <span class="badge badge-primary pull-right"></span></span>
                                </a>
                            </li> --}}
                            <li>
                                <a href="" class="waves-effect ">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Profile <span class="badge badge-primary pull-right"></span></span>
                                </a>
                            </li>
                        @endif
                        {{-- <li class="">
                        <a href="{{ route('logout') }}" class="waves-effect">
                        <i class="fa fa-sign-out"></i>
                        <span> Logout <span class="badge badge-primary pull-right"></span></span>
                        </a>
                </li> --}}
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="content-page">
            <div class="content">
                <div class="topbar">
                    <nav class="navbar-custom">
                        <ul class="list-inline float-right mb-0">
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user"
                                    data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <img src="{{ asset('images/g.png') }}" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-inline menu-left mb-0">
                            <li class="list-inline-item">
                                <button type="button" class="button-menu-mobile open-left waves-effect">
                                    <i class="ion-navicon"></i>
                                </button>
                            </li>
                            <li class="hide-phone list-inline-item app-search">
                                <h3 class="page-title">@yield('title')</h3>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </nav>
                </div>
                <!-- Top Bar End -->
                @yield('content')
                <!-- Page content Wrapper -->
            </div> <!-- content -->
            <footer class="footer">
                <span class="text-red">Copyright © 2020 <a style="color:#D23830"
                        href="https://doctoorc.com/"><strong>Doctoorc.com</strong></a> </span> <br>
                Designed Developed & Managed By <a class="text-red" href="#"><strong> BM Solutions</strong></a>
            </footer>

        </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/tether.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/js/detect.js') }}"></script>
    <script src="{{ asset('assets/js/fastclick.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/plugins/fullcalendar/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/pages/calendar-init.js') }}"></script>
    <!--Morris Chart-->
    <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/pages/dashborad.js') }}"></script>
    <!--Data tabel-->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="js/jsPDF/dist/jspdf.min.js"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('assets/pages/datatables.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/rfv7rfhx5vafv76ygxza52h080627sqb542j7d7736y9x8c2/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    @toastr_render
    @yield('scripts')
</body>


</html>
