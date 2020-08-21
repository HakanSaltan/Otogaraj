@extends('layouts.uye')
@section('css')
@endsection
@section('baslik')
Anasayfa
@endsection

@section('content')
    <div class="col-md-3">
        <!--begin::Card-->
        <div class="card card-custom card-stretch">
            <div class="card-header">
                <div class="card-title" style="margin: auto">
                    <h3 class="card-label">ARAÇ EKLE</h3>
                </div>
            </div>
            <div class="card-body text-center">
            <a @click="sendInfo('yeni','yeni')" class="text-primary text-hover-success"> <i class="fa fa-car icon-10x text-primary text-hover-success"></i>
            <h2>YENİ ARAÇ EKLE</h2>
            </a>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <div class="col-md-3">
        <!--begin::Card-->
        <div class="card card-custom card-stretch">
            <div class="card-header ">
                <div class="card-title" style="margin: auto">
                    <h3 class="card-label">FATURA</h3>
                </div>
            </div>
            <div class="card-body text-center">
                <a href="" class="text-primary text-hover-success"> <i class="fa fa-receipt icon-10x text-primary text-hover-success"></i>
                <h2>FATURA OLUŞTUR</h2></a>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <div class="col-md-3">
        <!--begin::Card-->
        <div class="card card-custom card-stretch">
            <div class="card-header ">
                <div class="card-title" style="margin: auto">
                    <h3 class="card-label">İŞLEM</h3>
                </div>
            </div>
            <div class="card-body text-center">
                <a href="" class="text-primary text-hover-success"> <i class="fa fa-tools icon-10x text-primary text-hover-success"></i>
                <h2>İŞLEM OLUŞTUR</h2></a>
            </div>
        </div>
        <!--end::Card-->
    </div>

    <div class="col-md-3">
        <!--begin::Card-->
        <div class="card card-custom card-stretch">
            <div class="card-header ">
                <div class="card-title" style="margin: auto">
                    <h3 class="card-label">MÜŞTERİLERİM</h3>
                </div>
            </div>
            <div class="card-body text-center">
                <a href="" class="text-primary text-hover-success"> <i class="fa fa-users icon-10x text-primary text-hover-success"></i>
                    <h2>KAYITLI MÜŞTERİLERİM</h2></a>
            </div>
        </div>
        <!--end::Card-->
    </div>

    <div class="col-md-3" style="top: 20px">
        <!--begin::Card-->
        <div class="card card-custom card-stretch">
            <div class="card-header ">
                <div class="card-title" style="margin: auto">
                    <h3 class="card-label">FİYAT LİSTESİ</h3>
                </div>
            </div>
            <div class="card-body text-center">
                <a href="" class="text-primary text-hover-success"> <i class="fa fa-shopping-cart icon-10x text-primary text-hover-success"></i>
                    <h2>PARÇA FİYAT LİSTESİ</h2></a>
            </div>
        </div>
        <!--end::Card-->
    </div>

    <div class="col-md-3" style="top: 20px">
        <!--begin::Card-->
        <div class="card card-custom card-stretch">
            <div class="card-header ">
                <div class="card-title" style="margin: auto">
                    <h3 class="card-label">İŞLEM GEÇMİŞİ</h3>
                </div>
            </div>
            <div class="card-body text-center">
                <a href="" class="text-primary text-hover-success"> <i class="fa fa-history icon-10x text-primary text-hover-success"></i>
                <h2>İŞLEM GEÇMİŞİ</h2></a>
            </div>
        </div>
        <!--end::Card-->
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
            gelenBilgi: [],
            secilenBilgi: {
                tip: 'yeni',
                plaka: '',
                sase: '',
                km: '',
                marka: '0',
                model: ''
            },
            postUrl: "#",
            reloadUrl: "#",
            markalar:{!! json_encode($arac_markalar) !!},
            modeller:{!! json_encode($arac_modeller) !!},
            secilenModeller:[]
        },
        methods: {
            async sendInfo(veri, tip) {
                if(tip == 'yeni'){
                    $('#aracEkle').modal('show');
                }
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
        },
        watch: {
            secilenBilgi: {
                deep: true,
                handler: function () {
                    // this.modellerFilter();
                    // $.each(this.modeller.find(x => x.marka_id == this.secilenBilgi.marka), function(value) {
                    //     this.secilenModeller.push(value);
                    // });
                },

            }
        },
    });
</script>
@endsection
