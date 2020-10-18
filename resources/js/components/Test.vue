<template>
<div>
    <div class="card-header border-0 pt-7">
        <div class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark" v-text="propsTitle"></span>
        </div>
        <div class="card-toolbar float-right">
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
                                             v-on:click="veriGet"><i class="flaticon-refresh"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-body pt-0 pb-3">
        <div class="table-responsive">
            <table class="table table-head-custom table-head-bg table-vertical-center table-borderless">
                <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="pl-7" v-for="column in columns" v-if="column.list">
                        {{ column.title }}
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in testVeri">
                    <td class="pr-0" v-for="column in columns" v-if="column.list">
                        <a v-if="column.fieldType == 'text'">
                            <span>{{ item[column.field] }} </span>
                        </a>
                        <div class="btn-group" v-if="column.fieldType == 'settings'">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-edit"></i></button>
                            <div class="dropdown-menu" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-242px, 31px, 0px);">
                                <a class="dropdown-item" v-if="modul.position=='menu'" :href="link(item,modul.url)" v-for="modul in module">{{propsSingularTitle}} {{modul.title}}</a>
                            </div>
                        </div>
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
</div>
</template>

<script>
export default {
    props: {
        propsApiUrl: String,
        propsAddUrl: String,
        propsUpdateUrl: String,
        propsDeleteUrl: String,
        propsTitle:String,
        propsFiltered:String,
        propsSingularTitle:String,
        propsId: String,
        columns:Array,
        module:Array
    },
    created: async function(){
        await this.veriGet();
    },
    computed: {
        filteredList()
        {
            return this.data.filter(post => {
                return post[this.propsFiltered].toLowerCase().includes(this.arama.toLowerCase())
            })
        }
    },
    data() {
        return {
            data:[],
            testVeri:[],
            loading: false,
            loading2: true,
            gelenBilgi: [],
            secilenBilgi: {},
            onayId:'',
            onayType:'',
            postUrl: "/admin/uyeOnay",
            reloadUrl: "/reload/admin/basvurular",
            aranacakKelime: '',
            aranacakSutun: 'name',
            orderByColumn: 'created_at',
            orderByType: 'DESC',
            page: 1,
            arama:'',
            options: {
                search: true,
                showColumns: true
            },
        }
    },
    mounted(){
        //this.reload();
    },
    methods:{
        async sendInfo(veri, tip) {
            this.secilenBilgi={
                tip:tip,
                id:veri.id
            };
            console.log(veri);
            if (tip == "reddet") {
                this.post();
            }
            else if (tip == "onayla")  {
                this.post();
            }

        },
        veriGet()
        {
          axios.get(this.propsApiUrl)
            .then(response=>{
                this.testVeri = response.data;
            })
        },
        aramaAc() {
            $('#aramaAc').modal('show');
        },
        post() {
            axios({
                url: this.postUrl,
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
            this.reload();
        },
        sayfayaGit(page) {
            this.page = page;
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
        link(item,url)
        {
            if( item.length==0)
            {
                return url;
            }
            if(item && typeof(url) !== 'undefined')
            {
                return url+item[this.propsId];
            }else
            {
                return null;
            }
        },
    },
    watch: {
        page: {
            handler: function (value) {
                this.reload();
            }
        }
    },
}
</script>


