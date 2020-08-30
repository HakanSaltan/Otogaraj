@extends('layouts.uye._profile')
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
    <a href="{{URL::asset('/uye/home')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Anasayfa</a>
    <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
    <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">Profil</a>
@endsection
@section("content")
    <div class="flex-row-fluid ml-lg-8">
        <transition name="fade" mode="out-in">
        <!--begin::Card-->
        <div class="card card-custom" key="1" v-if="genelAyarlar == true">
            <!--begin::Header-->
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="card-label font-weight-bolder text-dark">Hesap Bilgileri</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">Hesap bilgilerinizi guncelleyin</span>
                </div>
                <div class="card-toolbar">
                    <button type="submit" @click="hesapUpdate()" class="btn btn-success mr-2">Bilgileri Güncelle</button>
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
                    <label class="col-xl-3 col-lg-3 col-form-label">Şifre</label>
                    <div class="col-lg-9 col-xl-6">
                        <input type="password" class="form-control form-control-lg form-control-solid" v-model='kullaniciSifre' placeholder="Şifre">
                        <small>Sifrenizi Değiştirmek Önceki Şifrenizi Geçersiz Kılar</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label"></label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="checkbox-inline">
                            <label class="checkbox checkbox-outline checkbox-success">
                                <input type="checkbox" v-model="kullaniciSifreOnay" name="kullaniciSifreOnay">
                                <span></span>Şifremi Değiştirmek İstiyorum</label>
                        </div>
                    </div>
                </div>
            </div>

            <!--end::Form-->
        </div>
        <!--İsyeri Bilgileri-->
        <div class="card card-custom" key="2" v-else-if="isYeriAyarlar == true">
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="card-label font-weight-bolder text-dark">İsyeri Bilgileri</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">İsyeri bilgilerinizi guncelleyin</span>
                </div>
                <div class="card-toolbar">
                    <button type="submit" class="btn btn-success mr-2">Bilgileri Güncelle</button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Logonuz</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{URL::asset('assets/media/users/blank.png')}})">
                            <div class="image-input-wrapper" style="background-image: url({{URL::asset('assets/media/users/300_21.jpg')}})"></div>
                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Güncelle">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="profile_avatar_remove">
                            </label>
                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Güncelle">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Kaldır">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Desteklenen Resim Formatları: png, jpg, jpeg.</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Ticari Ünvanınız Adı</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control form-control-lg form-control-solid" v-model="ticariUnvan" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Adresiniz</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <textarea class="form-control" v-model="ticariAdres" id="exampleFormControlTextarea1" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Vergi No</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control form-control-lg form-control-solid" v-model="ticariVergiNo" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Sektör</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control form-control-lg form-control-solid" v-model="ticariSektor" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Telefon Numaranız</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control form-control-lg form-control-solid" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Banka Hesap Bilgileriniz</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Sloganınız</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <textarea class="form-control" v-model="ticariSlogan" id="exampleFormControlTextarea1" rows="2"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--İsyeri Bilgileri-->
        <!--Abonelik Bilgileri-->
        <div class="card card-custom" key="3" v-else-if="abonelikBilgileri == true">
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="card-label font-weight-bolder text-dark">Abonelik Bilgileriniz</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-center text-center my-0 my-md-25">
                    <!-- begin: Pricing-->
                    <div class="col-md-4 col-xxl-3 bg-primary my-md-n15 rounded shadow-sm">
                        <div class="pt-25 pt-md-37 pb-25 pb-md-10 py-md-28 px-4">
                            <h4 class="text-white mb-15">Ücretsiz Lisans</h4>
                            <span class="px-7 py-3 bg-white d-inline-flex flex-center rounded-lg mb-15 bg-white">
														<span class="pr-2 text-primary opacity-70">₺</span>
														<span class="pr-2 font-size-h1 font-weight-bold text-primary">0</span>
														<span class="text-primary opacity-70">/&nbsp;&nbsp;Aylık Ödeme Planı</span>
													</span>
                            <br>
                            <p class="text-white mb-10 d-flex flex-column">
                                <span>Ücretsiz ödeme planı uygulandı</span>
                            </p>
                        </div>
                    </div>
                    <!-- end: Pricing-->
                </div>
            </div>
        </div>
        <!--Abonelik Bilgileri-->
        <!--Finansal  Bilgileri-->
        <div class="card card-custom" key="4" v-else-if="finansalVeri == true">
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="card-label font-weight-bolder text-dark">Finansal Verileriniz</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                            <div class="col-md-12">
                                <blockquote class="blockquote">
                                    <h3 class="display-4">Finansal Verilerinizi Sıfırlayın</h3>
                                    <p class="mb-0">Tüm finansal verilerinizi sıfırlama şansınız var. Verileri sıfırla butonunu kullanırsanız tüm finansal verileriniz sıfırlanacaktır. </p>
                                    <br>
                                    <p class="mb-0 text-danger"> <i class="fas fa-exclamation-triangle text-danger"></i> Veri sıfırlama işlemi sonrasında eski verilere erişmeniz imkansızdır.</p>
                                </blockquote>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="#" class="btn btn-danger btn-shadow font-weight-bold font-size-h5 px-8 py-3 mr-2 ">VERİLERİ SIFIRLA</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Finansal Bilgileri-->
        </transition>
    </div>
@endsection

@section('js')
<script>
    let vm = new Vue({
        el: '#app',
        data: {
            genelAyarlar: true,
            isYeriAyarlar:false,
            abonelikBilgileri:false,
            finansalVeri:false,
            kullaniciAdi:'{!! $profil->name !!}',
            kullaniciMail:'{!! $profil->email !!}',
            kullaniciSifre:'*****',
            kullaniciSifreOnay:false,
            ticariUnvan:'{!! $profil->isyeri_adi !!}',
            ticariAdres:'{!! $profil->isyeri_adres !!}',
            ticariVergiNo:'{!! $profil->vergi_no !!}',
            ticariSektor:'{!! $profil->sektor !!}',
            ticariSlogan:'{!! $profil->hakkinda !!}'

        },
        methods: {
            goster(menu)
            {
                if (menu == 'isyeri'){
                    vm.isYeriAyarlar=true;
                    vm.genelAyarlar = false;
                    vm.abonelikBilgileri = false;
                    vm.finansalVeri=false;
                }
                if (menu == 'hesap')
                {
                    vm.genelAyarlar = true;
                    vm.isYeriAyarlar=false;
                    vm.abonelikBilgileri = false;
                    vm.finansalVeri=false;
                }
                if(menu == 'abonelik')
                {
                    vm.abonelikBilgileri = true;
                    vm.isYeriAyarlar = false;
                    vm.genelAyarlar = false;
                    vm.finansalVeri=false;
                }
                if (menu == 'finans')
                {
                    vm.finansalVeri=true;
                    vm.isYeriAyarlar = false;
                    vm.genelAyarlar = false;
                    vm.abonelikBilgileri = false;
                }
            },
            hesapUpdate()
            {
                let hesapGuncelle = '';
            }
        },

    });

</script>
@endsection
@section('css')
<style>
    .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
    }
</style>
@endsection
