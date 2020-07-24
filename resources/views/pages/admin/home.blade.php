@extends('layouts.app')
@section('css')
@endsection
@section('baslik')
Admin Anasayfa
@endsection
@section('subheader')
<h2 class="text-white font-weight-bold my-2 mr-5">Admin Anasayfa</h2>
@endsection
@section('subheaderalt')
<a href="#" class="opacity-75 hover-opacity-100">
    <i class="flaticon2-shelter text-white icon-1x"></i>
</a>
<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
<a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Admin Anasayfa</a>
@endsection
@section('content')
<div class="card card-custom card-stretch gutter-b">

    <div class="card-header border-0 pt-7">
        <div class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bold font-size-h4 text-dark-75">Başvurular</span>
        </div>
        <div class="card-toolbar">
            <ul class="nav nav-pills nav-pills-sm nav-dark">
                <li class="nav-item ml-0"><a class="nav-link py-2 px-4 font-weight-bolder font-size-sm"
                        @click="sayfayaGit(gelenBilgi.current_page-1)"><i class="flaticon2-fast-back"></i></a>
                </li>
                <li class="nav-item ml-0"><a class="nav-link py-2 px-4 font-weight-bolder font-size-sm"
                        @click="sayfayaGit(gelenBilgi.current_page+1)"><i class="flaticon2-fast-next"></i></a>
                </li>
                <li class="nav-item ml-0"><a class="nav-link py-2 px-4 font-weight-bolder font-size-sm"
                        v-on:click="aramaAc"><i class="flaticon-search"></i></a>
                </li>
                <li class="nav-item ml-0"><a class="nav-link py-2 px-4 font-weight-bolder font-size-sm"
                        v-on:click="reload"><i class="flaticon-refresh"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <content-loader v-if="!loading" :speed="2" :animate="true"></content-loader>
    <div class="card-body" v-if="loading">

        <table class="table table-borderless mb-6">
            <thead>
                <tr>
                    <th :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'durum','desc' : orderByType != 'ASC' && orderByColumn == 'durum'}"
                        @click="sirala('durum')">Durum</th>
                    <th :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'name','desc' : orderByType != 'ASC' && orderByColumn == 'name'}"
                        @click="sirala('name')">Uye Adı</th>
                    <th :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'isyeri_adi','desc' : orderByType != 'ASC' && orderByColumn == 'isyeri_adi'}"
                        @click="sirala('isyeri_adi')">Firma Adı</th>
                    <th :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'created_at','desc' : orderByType != 'ASC' && orderByColumn == 'created_at'}"
                        @click="sirala('created_at')">Oluşturulma Tarihi</th>
                    @can('KullaniciDuzenle')
                    <th class="pr-0 text-right">İşlemler</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                <tr v-for="(bilgi,index) in gelenBilgi.data">
                    <td><a v-text="bilgi.durum == 0 ? 'Onaysız' : Onaylı"></a></td>
                    <td><a v-text="bilgi.name"></a></td>
                    <td><a v-text="bilgi.isyeri_adi"></a></td>
                    <td><a v-text.number="bilgi.created_at"></a></td>
                    @can('KullaniciDuzenle')
                        <td class="pr-0 text-right">
                            <a v-on:click="onay('red',bilgi.id)" class="btn btn-icon btn-light btn-hover-danger btn-sm">
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo2/dist/../src/media/svg/icons/Navigation/Close.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                            <rect x="0" y="7" width="16" height="2" rx="1"/>
                                            <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                                        </g>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                            </a>
                            <a v-on:click="onay('check',bilgi.id)" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo2/dist/../src/media/svg/icons/Navigation/Double-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002) "/>
                                        <path d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002) "/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                            </a>
                        </td>
                    @endcan
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex flex-wrap py-2 mr-3">
                <a @click="sayfayaGit(1)" class="btn btn-icon btn-sm btn-light mr-2 my-1"><i
                        class="ki ki-bold-double-arrow-back icon-xs"></i></a>
                <a @click="sayfayaGit(gelenBilgi.current_page-1)" class="btn btn-icon btn-sm btn-light mr-2 my-1"><i
                        class="ki ki-bold-arrow-back icon-xs"></i></a>
                <template v-for="page in gelenBilgi.last_page"
                    v-if="page >= gelenBilgi.current_page - 3 && page <= gelenBilgi.current_page + 3">
                    <a href="#"
                        :class="{'btn btn-icon btn-sm border-0 btn-light btn-hover-primary active mr-2 my-1' : gelenBilgi.current_page == page, 'btn btn-icon btn-sm border-0 btn-light mr-2 my-1' : gelenBilgi.current_page != page}"
                        v-text="page" @click="sayfayaGit(page)"></a>
                </template>
                <a @click="sayfayaGit(gelenBilgi.last_page)" class="btn btn-icon btn-sm btn-light mr-2 my-1"><i
                        class="ki ki-bold-arrow-next icon-xs"></i></a>
                <a @click="sayfayaGit(gelenBilgi.current_page-1)" class="btn btn-icon btn-sm btn-light mr-2 my-1"><i
                        class="ki ki-bold-double-arrow-next icon-xs"></i></a>
            </div>
            <div class="d-flex align-items-center py-3">
                <div class="d-flex align-items-center" v-if='!loading2'>
                    <div class="mr-2 text-muted">Güncelleniyor...</div>
                    <div class="spinner mr-10"></div>
                </div>
                <span class="text-muted">Toplam <strong v-text="gelenBilgi.total"></strong> Kayıttan <strong
                        v-text="gelenBilgi.from + ' - ' + gelenBilgi.to"></strong>
                    Arası Kayıt Gösteriliyor.</span>
            </div>
        </div>
    </div>
    <div v-if="loading" class="modal fade" id="aramaAc" tabindex="-1" role="dialog" aria-hidden="true">
        <template>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title text-text-bold-600">Kullanici Arama | Önce Aramak İstediğiniz Kriteri
                            Seçiniz</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input ref="arama" class="form-control" v-model="aranacakKelime" type="text">
                        </div>
                        <div class="form-group">
                            <div class="radio-inline">
                                <label class="radio radio-square">
                                <input type="radio" v-model="aranacakSutun" name="adayAramaInput" value="name">
                                <span></span>Adı</label>

                                <label class="radio radio-square">
                                <input type="radio" v-model="aranacakSutun" name="adayAramaInput" value="email">
                                <span></span>Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" v-on:click="reload" class="btn btn-lg btn-block btn-danger mb-2"
                            data-dismiss="modal">Aramayı Tamamla</button>
                    </div>
                </div>
            </div>
        </template>
    </div>
    <div v-if="loading" class="modal fade text-left show" id="yetkiAc" tabindex="-1" role="dialog">
        <template>
            <div class="modal-dialog" role="document">
                <div class="modal-content" v-for="secilen in secilenBilgi">
                    <div class="modal-header">
                        <label class="modal-title text-text-bold-600"><strong v-text="secilen.adi"></strong> Yetki Ver</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Rolleri</label>
                            <div class="col-12">
                                <span class="switch switch-sm switch-icon" >
                                    <select class="form-control" v-model="secilen.role">
                                        <option selected disabled v-text="roleName(secilen.role)"></option>
                                        <option v-for="role in roller" :value="role.id" v-text="role.name"></option>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="">Yetkileri</label>
                            <div class="col-12" v-for='izin in izinler'>
                                <span class="switch switch-sm switch-icon">
                                    <label>
                                        <input type="checkbox" :value='izin.id' v-model="secilen.permission">
                                        <span></span>
                                        @{{izin.name}}
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-danger" data-dismiss="modal">Kapat</button>
                        <button type="button" @click="post()" class="btn btn-success" data-dismiss="modal">Kaydet</button>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>

@endsection

@section('js')
<script>
    let vm = new Vue({
        el: '#app',
        components: {
            'content-loader': window.contentLoaders.ListLoader,
        },
        data: {
            ozet: false,
            odak: false,
            loading: false,
            loading2: true,
            gelenBilgi: [],
            secilenBilgi: [],
            onayId:'',
            onayType:'',
            postUrl: "/admin/basvurular",
            releoadUrl: "/reload/admin/basvurular",
            aranacakKelime: '',
            aranacakSutun: 'name',
            orderByColumn: 'created_at',
            orderByType: 'DESC',
            page: 1,
            pageAktif: '',
            roller:{!! json_encode($roles) !!},
            izinler:{!! json_encode($permissions) !!},
        },
        methods: {
            async sendInfo(veri, tip) {
                this.secilenBilgi = [];
                    this.secilenBilgi.push({
                        tip: tip,
                        adi: veri.name,
                        email: veri.email,
                        permission: this.izin(veri.permission),
                        role:veri.role.role_id
                    });
                if (tip == "sil") {
                    vm.post()
                }
                else if (tip === "yetki")  {
                    $('#yetkiAc').modal('show');
                }

            },
            aramaAc() {
                $('#aramaAc').modal('show');
            },
            post() {
                axios({
                    url: "#",
                    method: "POST",
                    data: this.secilenBilgi
                }).then(function (data) {
                    vm.reload();
                }).catch(function (err) {
                    //hata mesajı döner
                });

            },
            sirala(sira) {
                this.orderByColumn = sira;
                this.orderByType = this.orderByType == "ASC" ? "DESC" : "ASC";
                vm.reload();
            },
            sayfayaGit(page) {
                this.page = page;
            },
            onay(type,id){
                this.onayId = id;
                this.onayType = type;
                let uyeOnayApi ='/admin/uyeOnay'

                let formData = new FormData();
                formData.append('type',vm.onayType);
                formData.append('id',vm.onayId);
                axios.post(uyeOnayApi,formData)
                .then(function(data){

                    toastr.success ("İşlem Başarılı", "Mesaj");
                    this.reload();
                }).catch(function (err) {
                        // swal({
                        //     icon: "error",
                        // });
                        toastr.error("İşlem Başarısız", "Hata");
                        console.log(err);
                    });
                
            },
            izin(dizi){
                console.log("Değer buraya girdi");
                let list=[];
                $.each(dizi, function(key, value) {
                    list.push(value.permission_id);
                });
                console.log(list);
                return list;
            },
            roleName(id){
                const listItem = this.roller.find(x => x.id === id );
                return listItem.name;
            },
            async reload() {
                $('#aramaAc').modal('hide');
                this.loading = false;
                await axios.get(this.releoadUrl + "?page=" + this.page + "&aranacakKelime=" + this
                    .aranacakKelime + "&aranacakSutun=" + this.aranacakSutun + "&orderbycolumn=" + this
                    .orderByColumn + "&orderbytype=" + this.orderByType, {}).then((response) => {
                    this.gelenBilgi = response.data;
                    this.loading = true;
                });
            }
        },
        mounted() {
            this.reload();
        },
        watch: {
            page: {
                handler: function (value) {
                    this.reload();
                }
            }
        },

    });
</script>
@endsection
@section('css')

@endsection
