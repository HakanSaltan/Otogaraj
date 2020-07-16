@extends('layouts.profile')
@section('baslik')
Profil
@endsection
@section('subheader')
<h2 class="text-white font-weight-bold my-2 mr-5">Profil</h2>
@endsection
@section('subheaderalt')
<a href="{{URL::asset('/')}}" class="opacity-75 hover-opacity-100">
    <i class="flaticon2-shelter text-white icon-1x"></i>
</a>
<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
<a href="{{URL::asset('/')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Anasayfa</a>
<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
<a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">Profil</a>
@endsection
@section("content")
<div class="flex-row-fluid ml-lg-8">
    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">Hesap Bilgileri</h3>
                <span class="text-muted font-weight-bold font-size-sm mt-1">Hesap ayarlarınızı değiştirin</span>
            </div>
            <div class="card-toolbar">
                <button v-on:click="kullaniciUp" type="submit" class="btn btn-success mr-2">Ayarları Uygula</button>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
            <div class="card-body">
                <!--begin::Heading-->
                <!--begin::Form Group-->
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Kullanıcı Adı</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control form-control-lg form-control-solid" type="text" v-model='kullaniciAdi'>

                       <!-- <div class="spinner spinner-sm spinner-success spinner-right">

                        </div>-->
                    </div>
                </div>
                <!--begin::Form Group-->
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Mail Adres</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-at"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control form-control-lg form-control-solid" v-model='kullaniciMail' placeholder="Email">
                        </div>
                    </div>
                </div>
                <!--begin::Form Group-->
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Uygulama Dili</label>
                    <div class="col-lg-9 col-xl-6">
                        <select class="form-control form-control-lg form-control-solid">
                            <option value="tr">Türkçe - Turkish</option>
                        </select>
                    </div>
                </div>
            </div>

        <!--end::Form-->
    </div>
    <!--end::Card-->
</div>
@endsection

@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    let vm = new Vue({
        el: '#app',
        data: {
            kullaniciAdi:'{{$profil->name}}',
            kullaniciMail:'{{$profil->email}}',
            token:'{{csrf_token()}}'
        },
        methods: {
            kullaniciUp(){
                let formData = new FormData();
                    formData.append('kullaniciAdi',vm.kullaniciAdi);
                    formData.append('kullaniciMail',vm.kullaniciMail);

                    axios.post('/admin/kullaniciUp',formData)
                    .then(function (data) {
                        swal({
                            icon: "success",
                        });
                    }).catch(function (err) {
                        swal({
                            icon: "error",
                        });
                        console.log(err);
                    });
                 }
        },

    });

</script>
@endsection
@section('css')

@endsection
