<!DOCTYPE html>
<html @if (App::getLocale() == 'ar')
dir="rtl" lang="ar"
@endif
>
{{-- dir="rtl" --}}
<style>
    i.lab {
        display: inline-block;
        border-radius: 60px;
        box-shadow: 0 0 2px #888;
        padding: 0.5em 0.6em;

    }

</style>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="_token" content="{{ csrf_token() }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="{{ asset('assets/plugins/fullcalendar/css/fullcalendar.min.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ url('web/assets/style.css') }}">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <link href="{{ asset('toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="country_dropdown/build/css/intlTelInput.css">

    <title>Doctoorc.com</title>
</head>

<body style="overflow-x: hidden" id="main_cntnt">

    <header id="myHeader">
        {{-- for mobileNAV --}}
        <nav class="mobile_nav">
            <div class="hamburger">
                <div id="mySidepanel" class="sidepanel">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                    <a href="#" class="mobile_nav_img">
                        <img src="{{ url('web/assets/logo.png') }}" alt="" />
                    </a>
                    <a class="li_a" href="{{ url('/') }}">{{ __('Main') }}</a>
                    <a class="li_a" href="{{ url('all_doctor') }}">{{ __('Doctors') }}</a>
                    <a class="li_a"
                        href="{{ url('how_book') }}">{{ __('Book a psychotherapy session online') }}</a> <a
                        class="li_a" href="{{ url('language/en') }}">English</a>
                    <a class="li_a" href="{{ url('language/ar') }}">عربى</a>
                </div>
                <button class="openbtn" onclick="openNav()">☰</button>
            </div>
            @if (!Auth::check())
                <div class="left">
                    <button type="button" class="left1 left2_a" data-toggle="modal" data-target="#exampleModal">
                        {{ __('Login') }}
                    </button>
                    <button type="button" class="left1 left1_a" data-toggle="modal" data-target="#exampleModal2"
                        style="margin: 5px;">
                        {{ __('Register') }}
                    </button>
                </div>
            @else
                <div class="left">
                    <a class="left2_a" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <a class="left2_a" href="{{ url('/home') }}">
                        ({{ Auth::user()->name }})
                    </a>


                </div>
            @endif

        </nav>
        @php
            $isoCode = Session::get('isoCode');
            
        @endphp
        <nav class="header_nav">
            <div class="logo">
                <img src="{{ url('web/assets/logo.png') }}" alt="" />
            </div>
            <div class="center">
                <ul class="header_ul">
                    <li class="center_li">
                        <a class="li_a" href="{{ url('/') }}">{{ __('Main') }}</a>
                    </li>
                    <li class="center_li">
                        <a class="li_a" href="{{ url('all_doctor') }}">{{ __('Doctors') }}</a>
                    </li>
                    <li class="center_li">
                        <a class="li_a"
                            href="{{ url('how_book') }}">{{ __('Book a psychotherapy session online') }}</a>
                    </li>
                    {{-- <li class="center_li">
                        <a class="li_a" href="{{ url('test') }}">psychometer </a>
                    </li> --}}
                    <a class="li_a" href="{{ url('language/en') }}">English</a>
                    <a class="li_a" href="{{ url('language/ar') }}">عربى</a>
                </ul>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @if (!Auth::check())
                <div class="left">
                    <button type="button" class="left1 left2_a" data-toggle="modal" data-target="#exampleModal">
                        {{ __('Login') }} </button>
                    <button type="button" class="left1 left1_a" data-toggle="modal" data-target="#exampleModal2"
                        style="margin: 5px;">
                        {{ __('Register') }}
                    </button>
                </div>
            @else
                <a class="left2_a" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <a class="left2_a" href="{{ url('/home') }}">
                    {{ __('Dashboard') }}
                </a>

            @endif
        </nav>
    </header>


    <!-- wizerd -->
    @yield('content')

    <!-- Footer -->
    @php
        $footer = App\Models\Footer::latest()->first();
        $socials = App\Models\SocialLink::latest()->first();
    @endphp
    <footer class="footer mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <h3> {{ __('About Us') }}</h3>
                    <p class="footer-text">
                        {{ __('your doctor | psychiatrist | Psychological consultations: It is a private electronic psychological clinic that offers psychological sessions via the Internet, so you will no longer need to go to a psychiatrist’s clinic, talk to a psychiatrist online with voice and video online.') }}
                    </p>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <h3>{{ __('Browse doctoorc') }}</h3>

                        <div class="col-lg-4 mt-2">
                            <ul class="footer-font text-white">
                                <li><a class="text-white" href="">{{ __('About Us') }} </a></li>
                                <li><a class="text-white" href=""> {{ __('Contact Us') }}</a></li>
                                <li><a class="text-white" href="">{{ __('Doctors') }}</a></li>
                                <li><a class="text-white" href="">{{ __('Blog') }}</a></li>
                            </ul>
                        </div>
                        {{-- <div class="col-lg-4 mt-2">
                            <ul class="footer-font">
                                <li>
                                    <a class="text-white" href="">معايير اختيار الطبيب النفسي</a>
                                </li>
                                <li><a class="text-white" href="">انضم لفريق الاطباء</a></li>
                                <li><a class="text-white" href="">اطلب طبيب الأن</a></li>
                                <li><a class="text-white" href="">احجز جلسة الأن</a></li>
                                <li><a class="text-white" href="">English</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3>{{ __('Follow us on social media') }}</h3>
                    <p class="mt-2 footer-font">
                        {{ __('Follow us on social media to get the latest news and updates about doctors and the site') }}
                    </p>
                    <div class="social-facbook facbook">
                        <a href="{{ $socials->facebook ?? '' }}" class="text-white">
                            <i class="lab la-facebook-f"></i>
                        </a>
                    </div>
                    <div class="social-facbook twitter">
                        <a href="{{ $socials->twitter ?? '' }}" class="text-white">

                            <i class="lab la-twitter"></i>
                        </a>
                    </div>
                    <div class="social-facbook insta">
                        <a href="{{ $socials->instagram ?? '' }}" class="text-white">

                            <i class="lab la-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-6" style="padding-left: 26px">
                <p> {{ __('All rights reserved to doctoorc ©') }} 2022</p>
            </div>
            <div class="col-lg-6" style="padding-left: 26px">
                <a class="m-3 text-white" href="{{ url('privacy') }}"> {{ __('Privacy') }}</a>
                <a class="m-3 text-white" href="{{ url('terms') }}"> {{ __('Terms & Conditions') }}</a>
                <a class="text-white" href="{{ url('cancelltion_policy') }}">
                    {{ __('Cancellation Policy') }}</a>
            </div>
        </div>
    </footer>
    <!-- Footer -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="margin-top: 5%;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Login') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid py-5 col-md-8 col-12">
                        <div class="row">
                            <div class="col-12">
                                <form autocomplete="off" class=" ng-valid" action="{{ route('login') }}"
                                    method="post">
                                    @csrf
                                    <div id="form_username_option" class="mb-3">
                                        <div class="input-group input-group-nacked mb-3">
                                            <span class="input-group-text" id="user-addon"><i
                                                    class="lar la-user"></i></span>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="{{ __('Email Address') }}" aria-describedby="user-addon"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="input-group input-group-nacked mb-3">
                                        <span class="input-group-text" id="user-addon"><i
                                                class="las la-lock"></i></span>
                                        <input id="password" name="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="{{ __('Password') }}" aria-describedby="user-addon">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="text-center mt-3">
                                        <a class="mb-3 d-inline-block ng-binding"
                                            href="{{ route('forget.password.get') }}">{{ __('Forgot your password?') }}</a>
                                    </div>
                                    <div class="text-center mb-5">
                                        <input class="btn btn-lg btn-primary w-100 mb-3" type="submit"
                                            value="{{ __('Sign in') }}">
                                        <div>
                                            <span class="ng-scope">{{ __("Don't have an account?") }}</span>
                                            <a id="createAccountModalBtn" href="javascript:void;"
                                                class="my3 ng-binding">{{ __('Create an account') }}</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="margin-top: 5%;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Register') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid py-5 col-md-8 col-12">
                        <div class="row">

                            <div class="col-12">
                                <form autocomplete="off" class=" ng-valid" action="{{ route('register') }}"
                                    method="POST">
                                    @csrf
                                    <div class="input-group input-group-nacked mt-4">
                                        <span class="input-group-text" id="user-addon"><i
                                                class="las la-user"></i></span>
                                        <input class="form-control" type="hidden" name="role" value="user"
                                            required="">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="{{ __('Username') }}" aria-describedby="user-addon"
                                            name="name" value="{{ old('name') }}" required autocomplete="name"
                                            autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-group input-group-nacked mt-4">
                                        <span class="input-group-text" id="user-addon"><i
                                                class="las la-envelope"></i></span>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="{{ __('Email Address') }}" aria-label="البريد الالكتروني"
                                            aria-describedby="user-addon" name="email" value="{{ old('email') }}"
                                            required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="input-group input-group-nacked mt-4">
                                        <span class="input-group-text" id="user-addon"><i
                                                class="las la-lock"></i></span>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="{{ __('Password') }}" aria-label="كلمة المرور"
                                            aria-describedby="user-addon" name="password" required
                                            autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong class="mb-5">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-group input-group-nacked mt-4">
                                        <span class="input-group-text"><i class="las la-phone"></i></span>
                                        <input id="phone" type="text"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="{{ __('Phone No') }}" name="phone" required>

                                        @error('phone')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong class="mb-5">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>





                                    {{-- <div class="form-check form-switch mb-3">
                                        <input class="form-check-input ng-pristine ng-untouched ng-valid ng-empty"
                                            type="checkbox" id="agreeterms" value="1" ng-model="new_user.agreeterms">
                                        <label class="form-check-label title-primary ng-binding" for="agreeterms"
                                            style="margin-right: 9%;">
                                            {{ __('I agree to the terms and conditions') }}</label>
                                    </div> --}}


                                    <div class="text-center mt-4">
                                        <input class="btn btn-lg btn-primary w-100 mb-3" type="submit"
                                            value="{{ __('Create an account') }}">
                                        <div>
                                            <span
                                                class="ng-scope">{{ __('Do you have already an account') }}</span>
                                            <a href="javascript:void;" id="loginModalBtn"
                                                class="my3 ng-binding">{{ __('Sign in') }} </a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.tiny.cloud/1/rfv7rfhx5vafv76ygxza52h080627sqb542j7d7736y9x8c2/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script src="country_dropdown/build/js/intlTelInput-jquery.min.js"></script>

    @toastr_render


    <script>
        currentCountry = @json($isoCode);
       
        window.onscroll = function() {
            myFunction();
        };
        $("#phone").intlTelInput({
            initialCountry:currentCountry,

        });

        var header1 = document.getElementById("myHeader");

        function myFunction() {
            if (window.pageYOffset > 100) {
                header1.classList.add("sticky");
            } else {
                header1.classList.remove("sticky");
            }
        }

        function openNav() {
            document.getElementById("mySidepanel").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
        }

        $('#createAccountModalBtn').click(function(e) {
            $('#exampleModal').modal('hide');
            $('#exampleModal2').modal('show');
        });

        $('#loginModalBtn').click(function(e) {
            $('#exampleModal2').modal('hide');
            $('#exampleModal').modal('show');
        });
    </script>
</body>

</html>
