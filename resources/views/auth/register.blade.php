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
                    <div class="col-md-12">
                        
                            <div class="mb-20">
                                <h3>Kaydol</h3>
                                <p class="opacity-60">Hesabınızı oluşturmak için bilgilerinizi girin</p>
                            </div>
                            <form class="form text-center" id="kt_login_signup_form" method="POST"
                                action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="name" type="text"
                                        class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 @error('Ad Soyad') is-invalid @enderror"
                                        name="name" placeholder="Ad Soyad" value="{{ old('name') }}" required
                                        autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email"
                                        class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 @error('email') is-invalid @enderror"
                                        name="email" placeholder="Email" value="{{ old('email') }}" required
                                        autocomplete="email">
    
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password"
                                        class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 @error('password') is-invalid @enderror"
                                        name="password" placeholder="Şifre Giriniz" required>
    
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="isyeri" type="text"
                                        class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 @error('İs yeri') is-invalid @enderror"
                                        name="isyeri" placeholder="İşletme Adı" value="{{ old('isyeri') }}" required
                                        autocomplete="isyeri" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group text-left px-8">
                                    <div class="checkbox-inline">
                                        <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                                            <input type="checkbox" name="agree" />
                                            <span></span>Kullanım koşullarını
                                            <a href="#" class="text-white font-weight-bold ml-1">kabul ediyorum</a>.</label>
                                    </div>
                                    <div class="form-text text-muted text-center"></div>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Kaydol</button>
                                    <a href="{{ asset('/login')}}" id="kt_login_signup" class="text-white font-weight-bold">Giriş Yap</a>
                                </div>
                            </form>
                        
                    </div>
                    <!--end::Login Header-->
                    <!--begin::Login Sign up form-->
                    
                    <!--end::Login Sign up form-->
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
