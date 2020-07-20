
<div class="d-flex flex-column-fluid">
    <div class="container-fluid ">
        <div class="d-lg-flex flex-row-fluid">
            @include('layouts.partials._aside')
            <div class="content-wrapper flex-row-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        @yield('content')
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <!--begin::Card-->
                            <div class="card card-custom card-stretch">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">Yeni Araç Ekle <small>Tamir</small></h3>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                   <a href=""> <i class="fa fa-car icon-10x text-primary text-hover-success"></i></a>
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                        <div class="col-lg-4">
                            <!--begin::Card-->
                            <div class="card card-custom card-stretch">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">Yeni Fatura Oluştur <small>Tamir</small></h3>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <a href=""> <i class="fa fa-receipt icon-10x text-primary text-hover-success"></i></a>
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                        <div class="col-lg-4">
                            <!--begin::Card-->
                            <div class="card card-custom card-stretch">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">Card Title <small>same height cards</small></h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    ...
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
