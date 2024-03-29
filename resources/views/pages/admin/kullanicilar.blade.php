
@extends('layouts.admin')
@section('baslik')
Kullanıcılar
@endsection
@section('subheader')
<h2 class="text-white font-weight-bold my-2 mr-5">Kullanıcılar</h2>
@endsection
@section('subheaderalt')
<a href="#" class="opacity-75 hover-opacity-100">
    <i class="flaticon2-shelter text-white icon-1x"></i>
</a>
<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
<a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Kullanıcılar</a>
<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
<a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">İçerik</a>
@endsection
@section("content")

<div class="card card-custom card-stretch gutter-b">

    <div class="card-header border-0 pt-7">
        <div class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Kullanicilar</span>
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
                        v-on:click="sendInfo('yeni','yeni')"><i class="flaticon-add"></i></a>
                </li>
                <li class="nav-item ml-0"><a class="nav-link py-2 px-4 font-weight-bolder font-size-sm"
                        v-on:click="reload"><i class="flaticon-refresh"></i></a>
                </li>
            </ul>
        </div>
    </div>
@can('KullaniciGor')
    <content-loader v-if="!loading" :speed="2" :animate="true"></content-loader>
    <div class="card-body pt-0 pb-3" v-if="loading">
        <div class="table-responsive">
            <table class="table table-head-custom table-head-bg table-vertical-center table-borderless">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="pl-7" :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'name','desc' : orderByType != 'ASC' && orderByColumn == 'name'}"
                        @click="sirala('name')"><span class="text-dark-75">Adı Soyadı</span></th>
                        <th style="min-width: 110px" :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'email','desc' : orderByType != 'ASC' && orderByColumn == 'email'}"
                            @click="sirala('email')">Email</th>
                        <th style="min-width: 110px" :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'created_at','desc' : orderByType != 'ASC' && orderByColumn == 'created_at'}"
                            @click="sirala('created_at')">Oluşturulma Tarihi</th>
                        <th style="min-width: 110px" :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'updated_at','desc' : orderByType != 'ASC' && orderByColumn == 'updated_at'}"
                            @click="sirala('updated_at')">Güncellenme Tarihi</th>
                        @can('KullaniciDuzenle')
                        <th style="min-width: 110px"></th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(bilgi,index) in gelenBilgi.data">
                        <td class="pl-0 py-8">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" v-text="bilgi.id"></a>
                                </div>
                                <div>
                                    <a href="#" class="label label-lg label-inline" :class="{'label-light-danger' : bilgi.role.role_id == 1, 'label-light-success' : bilgi.role.role_id == 2, 'label-light-primary' : bilgi.role.role_id == 3}" v-text="roleName(bilgi.role.role_id)"></a>
                                    <span class="text-muted font-weight-bold d-block" v-text="bilgi.name"></span>
                                </div>
                            </div>
                        </td>
                        <td><span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="bilgi.email"></span></td>
                        <td><span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text.number="bilgi.created_at"></span></td>
                        <td><span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text.number="bilgi.updated_at"></span></td>
                        @can('KullaniciDuzenle')
                            <td class="pr-0 text-right">
                                <a v-on:click="sendInfo(bilgi,'yetki')" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
                                                <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </a>
                                <a v-on:click="sendInfo(bilgi,'guncelle')"
                                    class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                        <!--begin::Svg Icon | path:../../../../../metronic/themes/metronic/theme/html/demo2/dist/assets/media/svg/icons/Communication/Write.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)">
                                                </path>
                                                <path
                                                    d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </a>
                                <a v-on:click="sendInfo(bilgi,'sil')" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                        <!--begin::Svg Icon | path:../../../../../metronic/themes/metronic/theme/html/demo2/dist/assets/media/svg/icons/General/Trash.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                    fill="#000000" fill-rule="nonzero"></path>
                                                <path
                                                    d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </a>
                            </td>
                        @endcan
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
                <a @click="sayfayaGit(gelenBilgi.current_page+1)" class="btn btn-icon btn-sm btn-light mr-2 my-1"><i
                    class="ki ki-bold-arrow-next icon-xs"></i></a>
                <a @click="sayfayaGit(gelenBilgi.last_page)" class="btn btn-icon btn-sm btn-light mr-2 my-1"><i
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
    <div v-if="loading" class="modal fade text-left show" id="modalAc" tabindex="-1" role="dialog">
        <template>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title text-text-bold-600">Kullanici Formu</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Kullanici Adı</label>
                            <input type="text" class="form-control" v-model="secilenBilgi.adi">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" v-model="secilenBilgi.email">
                        </div>
                        <div class="form-group">
                            <label for="">Şifre</label>
                            <input type="password" class="form-control" v-model="secilenBilgi.password">
                        </div>
                        <div class="form-group" v-if="secilenBilgi.tip == 'yeni'">
                            <label>Rolleri</label>
                            <span class="switch switch-sm switch-icon" >
                                <select class="form-control" v-model="secilenBilgi.role">
                                    <option v-for="role in roller" :value="role.name" v-text="role.name"></option>
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
        </template>
    </div>
    <div v-if="loading" class="modal fade text-left show" id="yetkiAc" tabindex="-1" role="dialog">
        <template>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title text-text-bold-600"><strong v-text="secilenBilgi.adi"></strong> Yetki Ver</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Rolleri</label>
                            <span class="switch switch-sm switch-icon" >
                                <select class="form-control" v-model="secilenBilgi.role">
                                    <option v-for="role in roller" :value="role.name" v-text="role.name"></option>
                                </select>
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Yetkileri</label>
                            <span class="switch switch-sm switch-icon" v-for='izin in izinler'>
                                <label>
                                    <input type="checkbox" :value='izin.name' v-model="secilenBilgi.permissions">
                                    <span></span>
                                    @{{izin.name}}
                                </label>
                            </span>
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
@endcan
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
            postUrl: "/admin/kullanicilar",
            reloadUrl: "/reload/admin/kullanicilar",
            aranacakKelime: '',
            aranacakSutun: 'name',
            orderByColumn: 'created_at',
            orderByType: 'DESC',
            page: 1,
            roller:{!! json_encode($roles) !!},
            izinler:{!! json_encode($permissions) !!},
        },
        methods: {
            async sendInfo(veri, tip) {
                if(tip == 'yeni'){
                    this.secilenBilgi={
                        tip: tip,
                        adi: '',
                        email: '',
                        password: '',
                        id: '',
                        role: 'uye'
                    };
                    $('#modalAc').modal('show');
                }else if(tip == 'yetki'){
                    this.secilenBilgi={
                        tip: tip,
                        id: veri.id,
                        permissions: vm.izin(veri.permission),
                        role: vm.roleName(veri.role.role_id)
                    };

                    $('#yetkiAc').modal('show');
                }else if(tip == 'guncelle'){
                    this.secilenBilgi={
                        tip: tip,
                        adi: veri.name,
                        email: veri.email,
                        id: veri.id,
                        password:'',
                    };
                    $('#modalAc').modal('show');
                }
                else if(tip == 'sil'){
                    this.secilenBilgi={
                        tip: tip,
                        id: veri.id,
                    };
                    vm.post()
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
                    toastr.success ("İşlem Başarılı", "Mesaj");
                    vm.reload();
                }).catch(function (err) {
                    toastr.error("İşlem Başarısız", "Hata");
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
            izin(dizi){
                let list=[];
                $.each(dizi, function(key, value) {
                    list.push(vm.permissionName(value.permission_id));
                });
                return list;
            },
            roleName(id){
                let listItem = this.roller.find(x => x.id == id );
                return listItem.name;
            },
            permissionName(id){
                let listItem = this.izinler.find(x => x.id == id );
                return listItem.name;
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
