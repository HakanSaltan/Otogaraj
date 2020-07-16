<!DOCTYPE html>
<html lang="tr">

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Giriş Yap - OtoGaraj</title>
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{URL::asset('assets/css/pages/login/classic/login-3.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/plugins/global/plugins.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('assets/css/style.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{URL::asset('assets/media/logos/favicon.ico')}}" />

</head>

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid"
                style="background-image: url({{URL::asset('assets/media/bg/bg-1.jpg')}});">
                <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                    <!--begin::Login Header-->
                    <div class="d-flex flex-center mb-15">
                        <a href="#">
                            <img src="{{URL::asset('assets/media/logos/logo-letter-9.png')}}" class="max-h-100px"
                                alt="" />
                        </a>
                    </div>
                    <!--end::Login Header-->

                    <!--begin::Login forgot password form-->
                    <div class="login-forgot">
                        <div class="mb-20">
                            <h3>Şifremi Unuttum ?</h3>
                            <p class="opacity-60">Şifrenizi sıfırlamak için e-postanızı girin.</p>
                        </div>
                        <form class="form" id="kt_login_forgot_form">
                            <div class="form-group mb-10">
                                <input
                                    class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8"
                                    type="text" placeholder="Email" name="email" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <button id="kt_login_forgot_submit"
                                    class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Talep</button>
                                <button id="kt_login_forgot_cancel"
                                    class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">İptal</button>
                            </div>
                        </form>
                    </div>
                    <!--end::Login forgot password form-->
                </div>
            </div>
        </div>
    </div>
    <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
    <script src="{{URL::asset('assets/plugins/global/plugins.bundle.js?v=7.0.5')}}"></script>
    <script src="{{URL::asset('assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5')}}"></script>
    <script src="{{URL::asset('assets/js/scripts.bundle.js?v=7.0.5')}}"></script>
    <script src="{{URL::asset('assets/js/pages/custom/login/login-general.js?v=7.0.5')}}"></script>
</body>

</html>
