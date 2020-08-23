@extends('layouts.uye')
@section('baslik')
Araçlar
@endsection
@section("content")
<div class="col-md-12">
    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Araçlarım</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm" v-text="'Toplam ' + gelenBilgi.total + ' Adet Araç Bulunmakta'"> </span>
            </h3>
            <div class="card-toolbar">

                <ul class="nav nav-pills nav-pills-sm nav-dark">
                    <li class="nav-item ml-0 p-3"><strong style="cursor:pointer; text-transform: uppercase" data-toggle="tooltip" data-placement="top" title="Aramak İstediğiniz Bölüme Gelene Kadar Tıklayınız" @click="aranacakSutunDegistir" v-text="aranacakSutun + ' Ara'"></strong></li>
                    <li class="nav-item ml-0 p-2"><input class="form-control" data-toggle="tooltip" data-placement="top" title="Aramak İstediğiniz Kelimeyi Yazıp Enter'a Basınız"  v-model="aranacakKelime" type="text"></li>
                    <li class="nav-item ml-0"><a class="nav-link py-2 px-4 font-weight-bolder font-size-sm"
                            @click="sayfayaGit(gelenBilgi.current_page-1)"><i class="flaticon2-fast-back"></i></a>
                    </li>
                    <li class="nav-item ml-0"><a class="nav-link py-2 px-4 font-weight-bolder font-size-sm"
                            @click="sayfayaGit(gelenBilgi.current_page+1)"><i class="flaticon2-fast-next"></i></a>
                    </li>
                    <li class="nav-item ml-0"><a class="nav-link py-2 px-4 font-weight-bolder font-size-sm"
                        v-on:click="sendInfo('yeni','yeni')"><i class="flaticon-add"></i></a>
                    </li>
                    <li class="nav-item ml-0"><a class="nav-link py-2 px-4 font-weight-bolder font-size-sm"
                            v-on:click="reload"><i class="flaticon-refresh"></i></a>
                    </li>
                </ul>

            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <content-loader v-if="!loading" :speed="2" :animate="true"></content-loader>
        <div class="card-body pt-0 pb-3" v-if="loading">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-head-custom table-head-bg table-vertical-center table-borderless">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th style="min-width: 250px" class="pl-7" :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'plaka','desc' : orderByType != 'ASC' && orderByColumn == 'plaka'}"
                                @click="sirala('plaka')">
                                <span class="text-dark-75">PLAKA</span>
                            </th>
                            <th :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'markaAdi','desc' : orderByType != 'ASC' && orderByColumn == 'markaAdi'}"
                                @click="sirala('markaAdi')" style="min-width: 130px">MARKA</th>
                            <th :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'modelAdi','desc' : orderByType != 'ASC' && orderByColumn == 'modelAdi'}"
                                @click="sirala('modelAdi')" style="min-width: 120px">MODEL</th>
                            <th :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'km','desc' : orderByType != 'ASC' && orderByColumn == 'km'}"
                                @click="sirala('km')" style="min-width: 120px">KM</th>
                            <th :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'sase','desc' : orderByType != 'ASC' && orderByColumn == 'sase'}"
                                @click="sirala('sase')" style="min-width: 110px">ŞASE</th>
                            <th style="min-width: 110px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(bilgi,index) in gelenBilgi.data">
                            <td class="pl-0 py-8">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                        <div class="symbol-label" style="background-image: url('https://www.qrcode-monkey.com/img/default-preview-qr.svg')"></div>
                                    </div>
                                    <div>
                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" v-text="bilgi.plaka"></a>
                                        <span class="text-muted font-weight-bold d-block"> Hakan SALTAN </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="bilgi.markaAdi"></span>
                                <span class="text-muted font-weight-bold">Onaylandı</span>
                            </td>
                            <td>
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="bilgi.modelAdi"></span>
                                <span class="text-muted font-weight-bold">Onaylandı</span>
                            </td>
                            <td>
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="bilgi.km"></span>
                                <span class="text-muted font-weight-bold">KM</span>
                            </td>
                            <td>
                                <span class="label label-lg label-light-primary label-inline" v-text="bilgi.sase"></span>
                            </td>
                            <td class="pr-0 text-right">
                                <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mr-3">
                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Bookmark.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </a>
                                <a href="{{URL::asset('/uye/aracDetay')}}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
            <!--end::Table-->
        </div>
        <!--end::Body-->
    </div>
</div>
<div class="modal left fade" id="aracEkle" tabindex="" role="dialog" aria-labelledby="aracEkleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title text-text-bold-600">Yeni Araç Ekle</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Plaka</label>
                    <input type="text" class="form-control" v-model="secilenBilgi.plaka">
                </div>
                <div class="form-group">
                    <label for="">Şase No</label>
                    <input type="text" class="form-control" v-model="secilenBilgi.sase">
                </div>
                <div class="form-group">
                    <label for="">KM</label>
                    <input type="text" class="form-control" v-model="secilenBilgi.km">
                </div>
                <div class="form-group">
                    <label>Marka</label>
                    <span class="switch switch-sm switch-icon" >
                        <select class="form-control" v-model="secilenBilgi.marka">
                            <option v-for="marka in markalar" :value="marka.id" v-text="marka.name"></option>
                        </select>
                    </span>
                </div>
                <div class="form-group">
                    <label>Model</label>
                    <span class="switch switch-sm switch-icon" >
                        <select class="form-control" v-model="secilenBilgi.model">
                            <option v-for="model in modeller" v-if="model.marka_id == secilenBilgi.marka" :value="model.id" v-text="model.name"></option>
                        </select>
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-danger" data-dismiss="modal">Kapat</button>
                <button type="button" @click="post" class="btn btn-success" data-dismiss="modal">Kaydet</button>
            </div>
        </div>
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
            loading: false,
            loading2: true,
            gelenBilgi: [],
            secilenBilgi: {},
            postUrl: "#",
            reloadUrl: "/reload/uye/araclar",
            aranacakSira : 0,
            aranacakKelime: '',
            aranacakSutun: 'plaka',
            orderByColumn: 'created_at',
            orderByType: 'DESC',
            page: 1,
            markalar:{!! json_encode($arac_markalar) !!},
            modeller:{!! json_encode($arac_modeller) !!}
        },
        methods: {
            async sendInfo(veri, tip) {
                if(tip == 'yeni'){
                    this.secilenBilgi={
                        tip: tip,
                        plaka: '',
                        sase: '',
                        km: '',
                        marka: '0',
                        model: '0'
                    }
                    $('#aracEkle').modal('show');
                }
            },
            sirala(sira) {
                this.orderByColumn = sira;
                this.orderByType = this.orderByType == "ASC" ? "DESC" : "ASC";
                vm.reload();
            },
            sayfayaGit(page) {
                this.page = page;
            },
            post() {
                axios({
                    url: "#",
                    method: "POST",
                    data: this.secilenBilgi
                }).then(function (data) {
                    toastr.success ("İşlem Başarılı", "Mesaj");
                    vm.reload();
                }).catch(function (err) {
                    toastr.error("İşlem Başarısız", "Hata");
                });

            },
            async reload() {
                $('#aramaAc').modal('hide');
                this.loading = false;
                await axios.get(this.reloadUrl + "?page=" + this.page + "&aranacakKelime=" + this
                    .aranacakKelime + "&aranacakSutun=" + this.aranacakSutun + "&orderbycolumn=" + this
                    .orderByColumn + "&orderbytype=" + this.orderByType, {}).then((response) => {
                    this.gelenBilgi = response.data;
                    this.loading = true;
                });
            },
            aranacakSutunDegistir(){
                let aranacaklar = ['plaka','sase','marka','model'];
                this.aranacakSira += 1;
                this.aranacakSira == 4 ? this.aranacakSira = 0 : this.aranacakSira;
                this.aranacakSutun = aranacaklar[this.aranacakSira];
            },
        },
        mounted() {
        this.reload();
        },
        created: function () {
            document.addEventListener('keypress', function (e) {
                console.log(e);
                if (e.key === 'Enter') {
                    vm.reload();
                }
            });
        },
        watch: {
            page: {
                handler: function (value) {
                    this.reload();
                }
            }
        }
    });

</script>
@endsection
@section('css')

@endsection
