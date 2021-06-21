@extends('layouts.template_info') @section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12 mt-30 head-logo">
                <img src="{{ asset('/img/korlantas.png') }}" />
                <h3>korlantas polri</h3>
            </div>
        </div>
    </div>
    <div class="popbox">
        <div class="dimmer"></div>

        <div class="moda">
            @include('common.svg_polwan')
            <div class="outgap">
                <div class="workarea">
                    <div class="center">
                        <img class="polwan" src="{{ asset('/img/polwan.png') }}" />
                        <h3>SELAMAT DATANG DI SISTEM</h3>
                        <h3>PELAPORAN OPERASI ONLINE BIDANG</h3>
                        <h3>LALU LINTAS KORLANTAS POLRI</h3>
                    </div>
                    @if (is_null(operationPlans()))

                    @else
                    <p class="text-welcome">
                        GIAT {{ operationPlans()->name }}
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page_js')
<script>
    wReady = function (f, w) {
        var r = document.readyState;
        w || r != "loading"
            ? r != "complete"
                ? window.addEventListener("load", function () {
                    f(3);
                })
                : f(3)
            : document.addEventListener("DOMContentLoaded", function () {
                f(2) && wReady(f);
            });
    };
    doInit = function (f, w) {
        (w > 1 || (w && document.readyState == "loading") || f(1)) && wReady(f, w > 1);
    };

    $(document).ready(function () {
        redirectAfter()

        doInit(function () {
            if (typeof $ == "undefined") return 1;

            PopBox.init({
                auto_show: true, // in milliseconds. 15000 milliseconds = 15 seconds. 0 = disabled.
                auto_close: 60000, // in milliseconds. 60000 = 60 seconds. 0 = disabled.
                show_on_scroll_start: 48, // starting scroll position in percents, between 0% and 100%. Both 0 = disabled.
                show_on_scroll_end: 52, // ending scroll position. Eg 40..60 means that popbox will appear when any part of page between 40% and 60% is appeared in the viewport.
                closeable_on_dimmer: false,
                auto_start_disabled: false,
            });
        }, 1);
    });

    function redirectAfter() {
        setTimeout(function () {
            window.location.href = route("dashboard");
        }, 5000);
    }
</script>
@endpush
