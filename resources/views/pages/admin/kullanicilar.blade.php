@extends("layouts.app")
@section('css')
@endsection
@section("content")
<div id="app">
    <div class="card card-custom gutter-b card-stretch">
        <div class="card-header border-0 pt-5">
            <div class="card-title">
                <div class="font-weight-bolder">Anasayfa</div>
            </div>
            <div class="card-toolbar">
                <div class="dropdown dropdown-inline">
                    <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="ki ki-bold-more-hor"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                        <ul class="navi navi-hover py-5">
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="flaticon2-drop"></i></span>
                                    <span class="navi-text">New Group</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Kullanicilar</h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a @click="sayfayaGit(gelenBilgi.current_page-1)" ><i class="icon-arrow-left"></i></a></li>
                                    <li><a @click="sayfayaGit(gelenBilgi.current_page+1)" ><i class="icon-arrow-right"></i></a></li>
                                    <li><a v-on:click="aramaAc"><i class="icon-search4"></i></a></li>
                                    <li><a v-on:click="sendInfo('yeni','yeni')"><i class="icon-magic"></i></a></li>
                                    <li><a data-action="collapse" ><i class="icon-minus4"></i></a></li>
                                    <li><a v-on:click="reload"><i class="icon-reload"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                    <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <content-loader  v-if="!loading" :speed="2" :animate="true"></content-loader>
                        <div class="card-body collapse in" v-if="loading">
                            <div class="table-responsive">
                                <table class="table table-sortable mb-0">
                                    <thead>
                                        <tr>
                                            <th :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'id','desc' : orderByType != 'ASC' && orderByColumn == 'id'}" @click="sirala('id')">ID</th>
                                            <th :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'name','desc' : orderByType != 'ASC' && orderByColumn == 'name'}" @click="sirala('name')">Adı</th>
                                            <th :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'email','desc' : orderByType != 'ASC' && orderByColumn == 'email'}" @click="sirala('email')">Email</th>
                                            <th :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'created_at','desc' : orderByType != 'ASC' && orderByColumn == 'created_at'}" @click="sirala('created_at')">Oluşturulma Tarihi</th>
                                            <th :class="{'asc' : orderByType == 'ASC' && orderByColumn == 'updated_at','desc' : orderByType != 'ASC' && orderByColumn == 'updated_at'}" @click="sirala('updated_at')">Güncellenme Tarihi</th>
                                            <th>İşlemler</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(bilgi,index) in gelenBilgi.data">
                                            <td><a v-text="bilgi.id"></a></td>
                                            <td><a v-text="bilgi.name"></a></td>
                                            <td><a v-text="bilgi.email"></a></td>
                                            <td><a v-text.number="bilgi.created_at"></a></td>
                                            <td><a v-text.number="bilgi.updated_at"></a></td>
                                            <td>
                                                <button type="button" class="btn btn-float btn-info btn-round" v-on:click="sendInfo(bilgi,bilgi.id)"><i class="icon-edit2"></i></button>
                                                <button type="button" class="btn btn-float btn-danger btn-round" v-on:click="sendInfo(bilgi,'sil')"><i class="icon-trash-o"></i></button>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row p-1">
                                <div class="col-xl-4 col-lg-12">
                                    <br>Toplam <strong v-text="gelenBilgi.total"></strong> Kayıttan <strong v-text="(((gelenBilgi.current_page - 1) * gelenBilgi.per_page)+1) + ' - ' + (gelenBilgi.current_page) * gelenBilgi.per_page"></strong> Arası Kayıt Gösteriliyor.
                                </div>
                                <div class="col-xl-2 col-lg-12"></div>
                                <div class="col-xl-6 col-lg-12">
                                    <div class="text-xs-right">
                                        <nav aria-label="Page navigation">

                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link" @click="sayfayaGit(gelenBilgi.current_page-1)" aria-label="Önceki">
                                                        <span aria-hidden="true">« Önceki</span>
                                                        <span class="sr-only">Önceki</span>
                                                    </a>
                                                </li>
                                                <li v-for="page in gelenBilgi.last_page" v-if="page >= gelenBilgi.current_page - 3 && page <= gelenBilgi.current_page + 3" :class="{'page-item active' : gelenBilgi.current_page == page, 'page-item' : gelenBilgi.current_page != page}"><a class="page-link" v-text="page" @click="sayfayaGit(page)"></a></li>
                                                <li class="page-item">
                                                    <a class="page-link" @click="sayfayaGit(gelenBilgi.current_page+1)" aria-label="Sonraki">
                                                        <span aria-hidden="true">Sonraki »</span>
                                                        <span class="sr-only">Sonraki</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="loading" class="modal fade" id="aramaAc" tabindex="-1" role="dialog" aria-hidden="true">
            <template>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header white">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white">×</span>
                            </button>
                            <label class="modal-title text-text-bold-600">Kullanici Arama | Önce Aramak İstediğiniz Kriteri Seçiniz</label>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input ref="arama" class="form-control" v-model="aranacakKelime" type="text" >
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                        <label class="container">
                                            <input type="radio" v-model="aranacakSutun" name="adayAramaInput" value="name">
                                            <span class="checkmark">Adı</span>
                                        </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                        <label class="container">
                                            <input type="radio" v-model="aranacakSutun" name="adayAramaInput" value="email">
                                            <span class="checkmark">Email</span>
                                        </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" v-on:click="reload" class="btn btn-lg btn-block btn-danger mb-2" data-dismiss="modal">Aramayı Tamamla</button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <div v-if="loading" class="modal fade text-left show" id="modalAc" tabindex="-1" role="dialog">
            <template>
                <div class="modal-dialog" role="document">
                    <div class="modal-content" v-for="secilen in secilenBilgi">
                        <div class="modal-header white">
                        <i class="modal-title white">Kullanici Formu</i>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Kullanici Adı</label>
                                <input type="text" class="form-control" v-model="secilen.adi">
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
    </div>
</div>
@endsection()

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
            gelenBilgi: [],
            secilenBilgi: [],
            postUrl : "/admin/kullanicilar",
			releoadUrl : "/reload/admin/kullanicilar",
            aranacakKelime: '',
            aranacakSutun: 'name',
            orderByColumn: 'created_at',
            orderByType: 'DESC',
            page: 1,
            pageAktif: '',
        },
        methods: {
            async sendInfo(veri,tip){
                this.secilenBilgi=[];
                if(veri == 'yeni'){
                    this.secilenBilgi.push({
                        tip:tip,
                        adi:'',
                        id:''
                    });
                }else{
                    this.secilenBilgi.push({
                        tip:tip,
                        adi:veri.adi,
                        id:veri.id
                    });
                }
                if(tip == "sil"){
                    vm.post()
                }else if(tip == "yeni"){
                    $('#modalAc').modal('show');
                }else{
                    $('#modalAc').modal('show');
                }

            },
            aramaAc(){
                $('#aramaAc').modal('show');
            },
            post(){
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
            sirala(sira){
                this.orderByColumn = sira;
                this.orderByType = this.orderByType == "ASC" ? "DESC" : "ASC";
                vm.reload();
            },
            sayfayaGit(page){
                this.page = page;
            },
            async reload(){
                $('#aramaAc').modal('hide');
                this.loading = false;
                await axios.get( this.releoadUrl + "?page=" + this.page + "&aranacakKelime=" + this.aranacakKelime + "&aranacakSutun=" + this.aranacakSutun + "&orderbycolumn=" + this.orderByColumn + "&orderbytype=" + this.orderByType, {}).then((response) => {
                    this.gelenBilgi = response.data;
                    this.loading = true;
                });
            },


        },
        mounted() {
            this.reload();
        },
        created: function () {
            document.addEventListener('keypress',function (e) {
                console.log(e);
                if (e.key === 'Enter') {
                    vm.reload();
                }

            });
            $(document).bind('keydown', 'ctrl+f', function(e) {
				e.preventDefault();
                vm.aramaAc();
                vm.$refs.arama.focus();
				return false;
		    });

        },
        watch:{
            page: {
                handler: function(value) {
                    this.reload();
                }
            }
        },

    });
</script>
@endsection()

