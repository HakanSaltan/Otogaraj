
@extends('layouts.admin2')
@section('baslik')
    Vue Test
@endsection
@section('subheader')
    <h2 class="text-white font-weight-bold my-2 mr-5">Araçlar</h2>
@endsection
@section('subheaderalt')
    <a href="#" class="opacity-75 hover-opacity-100">
        <i class="flaticon2-shelter text-white icon-1x"></i>
    </a>
    <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
    <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Araçlar</a>
    <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
    <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">İçerik</a>
@endsection
@section("content")

    <div id="otoApp">
        <div class="card card-custom card-stretch gutter-b">
            <test props-title="Sisteme Kayıtlı Araçlar"
                  props-singular-title="Araç"
                  props-api-url="{{URL::asset('/admin/apiAraclar')}}"
                  props-filtered="plaka"
                  props-id="id"
                  :columns="[
                    {title: 'id',field: 'id',fieldType: 'text',inputType:'textBox',update:false,create:false,list:true},
                    {title: 'Plaka',field: 'plaka',fieldType: 'text',inputType:'textBox',update:false,create:false,list:true},
                    {title: 'Km',field: 'km',fieldType: 'text',inputType:'textBox',update:false,create:false,list:true},
                    {title: 'Ayar',fieldType: 'settings',update:false,create:false,list:true}
                  ]"
                  :module="[
                                    {title: 'Düzenle' ,url:'/admin/aracDuzenle/',position:'menu'},
                                    {title: 'Sil', url:'/admin/aracSil/',position:'menu'}
                                ]"
            ></test>
        </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
@endsection
