@extends('layouts.uye')
@section('baslik')
Araçlar
@endsection
@section("content")
<div class="col-md-12">
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-4">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 gutter-b card-stretch">
                        <!--begin::Header-->
                        <div class="card-header border-0 bg-primary py-5">
                        <h3 class="card-title font-weight-bolder text-white"> <a href="{{URL::asset('/uye/aracDetay')}}" class="text-white font-weight-bold font-size-h6 mt-2"><h4>54 HN 242</h4></a></h3>
                            <div class="card-toolbar">
                                <div class="dropdown dropdown-inline">
                                    <a href="#" class="btn btn-transparent-white btn-sm font-weight-bolder dropdown-toggle px-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        <!--begin::Navigation-->
                                        <ul class="navi navi-hover">
                                            <li class="navi-header pb-1">
                                                <span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-shopping-cart-1"></i>
                                                    </span>
                                                    <span class="navi-text">Order</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-calendar-8"></i>
                                                    </span>
                                                    <span class="navi-text">Event</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-graph-1"></i>
                                                    </span>
                                                    <span class="navi-text">Report</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-rocket-1"></i>
                                                    </span>
                                                    <span class="navi-text">Post</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-writing"></i>
                                                    </span>
                                                    <span class="navi-text">File</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!--end::Navigation-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Chart-->
                            <div class="card-rounded-bottom bg-primary" style="height: 200px; min-height: 200px;">
                                <img src="https://www.qrcode-monkey.com/img/default-preview-qr.svg"  height="200px" style="margin-left:28%" alt="">
                            </div>
                            <!--end::Chart-->
                            <!--begin::Stats-->
                            <div class="card-spacer mt-n25">
                                <!--begin::Row-->
                                <div class="row m-0">
                                    <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                            Marka
                                        </span>
                                        <a href="#" class="text-primary font-weight-bold font-size-h6 mt-2"><h4>Ford</h4></a>
                                    </div>
                                    <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                            Model
                                        </span>
                                        <a href="#" class="text-primary font-weight-bold font-size-h6 mt-2"><h4>Fiesta</h4></a>
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row m-0">
                                    <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                            KM
                                        </span>
                                        <a href="#" class="text-primary font-weight-bold font-size-h6 mt-2"><h4>171000</h4></a>
                                    </div>
                                    <div class="col bg-light-success px-6 py-8 rounded-xl">
                                        <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                            Sahip
                                        </span>
                                        <a href="#" class="text-success font-weight-bold font-size-h6 mt-2"><h4>Hakan SALTAN</h4></a>
                                    </div>
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Stats-->
                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 414px; height: 447px;"></div></div><div class="contract-trigger"></div></div></div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
            </div>

        </div>
    </div>
</div>


@endsection

@section('js')
<script>
    let vm = new Vue({
        el: '#app',
        data: {
            postUrl: "#"
        },
        methods: {

        },

    });

</script>
@endsection
@section('css')

@endsection
