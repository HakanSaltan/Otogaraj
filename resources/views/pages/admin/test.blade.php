
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
        <test></test>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
@endsection
