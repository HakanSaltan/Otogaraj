
<div class="d-flex flex-column-fluid">
    <div class="container-fluid ">
        <div class="d-lg-flex flex-row-fluid">
            @include('layouts.partials._profileaside')
            <div class="content-wrapper flex-row-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
