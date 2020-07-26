
<div class="d-flex flex-column-fluid">
    <div class="container-fluid ">
        <div class="d-lg-flex flex-row-fluid">
            @include('layouts.partials._aside')
            <div class="content-wrapper flex-row-fluid">
                <div class="row">
                        @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
