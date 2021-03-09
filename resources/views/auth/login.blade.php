@extends('layouts.template_login')

@section('content')
<div class="form-container outer">
<div class="container">
    <div class="row">
    <div class="centered">
        <div class="col-sm-12">
            <div class="col-sm-2 offset-md-5">
                <img class="logo-login" src="{{ secure_asset('/img/korlantas.png') }}">
            </div>
            <div class="text-center">
        <h1 class="text-logo">SISTEM PELAPORAN</h1>
        <h1 class="text-logo">OPERASI ONLINE BIDANG LALU LINTAS KORLANTAS POLRI</h1>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14.5" height="51.4" class="left-kurung" viewBox="0 0 14.5 51.4"><defs><style>.a{fill:none;stroke:#00adef;stroke-width:3px;}.b{filter:url(#a);}</style><filter id="a" x="0" y="0" width="14.5" height="51.4" filterUnits="userSpaceOnUse"><feOffset input="SourceAlpha"/><feGaussianBlur stdDeviation="1" result="b"/><feFlood flood-color="#00adef" flood-opacity="0.502"/><feComposite operator="in" in2="b"/><feComposite in="SourceGraphic"/></filter></defs><g class="b" transform="matrix(1, 0, 0, 1, 0, 0)"><path class="a" d="M-2356,2531h-7v42.4h7" transform="translate(2367.5 -2526.5)"/></g></svg>
        <div class="text-slogan">
            @if (is_null(operationPlans()))
                TIDAK ADA OPERASI SAAT INI
            @else
                GIAT {{ operationPlans()->name }} 
            @endif
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14.5" height="51.4" class="right-kurung" viewBox="0 0 14.5 51.4"><defs><style>.a{fill:none;stroke:#00adef;stroke-width:3px;}.b{filter:url(#a);}</style><filter id="a" x="0" y="0" width="14.5" height="51.4" filterUnits="userSpaceOnUse"><feOffset input="SourceAlpha"/><feGaussianBlur stdDeviation="1" result="b"/><feFlood flood-color="#00adef" flood-opacity="0.502"/><feComposite operator="in" in2="b"/><feComposite in="SourceGraphic"/></filter></defs><g class="b" transform="matrix(1, 0, 0, 1, 0, 0)"><path class="a" d="M-2363,2531h7v42.4h-7" transform="translate(2366 -2526.5)"/></g></svg>
    </div>
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">

                    <form method="POST" action="{{ route('login') }}" class="text-left">
                        @csrf
                        <div class="form">

                            <div id="username-field" class="field-wrapper input">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="feather feather-user" viewBox="0 0 26.154 27.788"><path id="Union_1" data-name="Union 1" d="M10.97,26.771l.518-5.814h1.863l.588,5.828Zm3.005,0,2.364-8.532a23.344,23.344,0,0,1,4.949,1.648c1.671.937,2.3,1.067,2.553,1.745s1.1,5.139,1.1,5.139ZM0,26.771s.851-4.46,1.1-5.139.883-.808,2.553-1.745a23.344,23.344,0,0,1,4.949-1.648l2.364,8.532Zm11.516-6.389a10.827,10.827,0,0,1-.693-1.314c-.084-.3.294-.754.294-.754h2.459a.64.64,0,0,1,.4.776l-.609,1.293Zm1.109-3.21h-.3a4.6,4.6,0,0,1-3.864-2.384c-.192-.326-.7-1.646-.7-1.646s-.234.312-.413.3-.646-.2-.962-1.178a2.085,2.085,0,0,1,.069-1.873c.206-.255.756.2.756.2L7.15,9.019c1.633,1.154,5.239,1.081,5.239,1.081h.164s3.611.073,5.242-1.084l-.056,1.571s.55-.454.756-.2a2.085,2.085,0,0,1,.069,1.873c-.316.979-.784,1.164-.962,1.178s-.412-.3-.412-.3-.509,1.32-.7,1.646a4.6,4.6,0,0,1-3.839,2.384Zm-5.683-9.2c0-.252.007-.616.008-.707V6.221l0-.014c0-.041.014-.279.372-.431a14.4,14.4,0,0,1,5.444-.795,12,12,0,0,1,5.012.864l0,0A.478.478,0,0,1,18,6.118L18,7.242v.006c0,.068.006.521.008.721-1.25,1.408-5.4,1.343-5.449,1.341h-.281C11.6,9.311,8.076,9.248,6.942,7.969ZM5.131,3.775A8.021,8.021,0,0,1,12.391,0h.164a8.021,8.021,0,0,1,7.26,3.775c1.24,2.107-.637,3.094-1.334,3.375l.005-1.078,0-.022a.963.963,0,0,0-.5-.659,12.344,12.344,0,0,0-5.218-.911,14.762,14.762,0,0,0-5.628.832.981.981,0,0,0-.673.917V7.15C5.769,6.869,3.891,5.882,5.131,3.775Zm5.976-1.513a1.366,1.366,0,1,0,2.731,0,1.366,1.366,0,1,0-2.731,0Z" transform="translate(0.604 0.5)" fill="#00adef" stroke="rgba(0,0,0,0)" stroke-miterlimit="10" stroke-width="1"/></svg>
                                <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" placeholder="User Name">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div id="password-field" class="field-wrapper input mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="feather feather-lock" viewBox="0 0 18.454 23.659"><path id="Path_239" data-name="Path 239" d="M209.086,219.823h-.024V218.2a6.992,6.992,0,0,0-6.984-6.984H201.8a6.993,6.993,0,0,0-6.984,6.984v1.626h-.023a2.086,2.086,0,0,0-2.08,2.08v10.891a2.085,2.085,0,0,0,2.08,2.079h14.3a2.084,2.084,0,0,0,2.079-2.079V221.9A2.085,2.085,0,0,0,209.086,219.823ZM196.848,218.2a4.954,4.954,0,0,1,4.949-4.949h.281a4.955,4.955,0,0,1,4.95,4.949v1.626h-10.18Zm5.848,9.869v1.943a.758.758,0,0,1-1.515,0v-1.943a2.105,2.105,0,1,1,1.515,0Z" transform="translate(-192.71 -211.213)" fill="#00adef"/></svg>
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="feather feather-eye" viewBox="0 0 20 14.002">
                                <path id="show" d="M12,19a10.785,10.785,0,0,1-4.746-1.035,10.076,10.076,0,0,1-3.041-2.282A10.59,10.59,0,0,1,2.1,12.316L2,12l.105-.316A10.661,10.661,0,0,1,4.214,8.317a10.074,10.074,0,0,1,3.04-2.282A10.785,10.785,0,0,1,12,5a10.786,10.786,0,0,1,4.746,1.035,10.073,10.073,0,0,1,3.041,2.282A10.5,10.5,0,0,1,21.9,11.684L22,12l-.1.316A10.423,10.423,0,0,1,12,19ZM12,7a8.308,8.308,0,0,0-7.883,5A8.307,8.307,0,0,0,12,17a8.309,8.309,0,0,0,7.883-5A8.3,8.3,0,0,0,12,7Zm0,8a3.02,3.02,0,1,1,2.115-.884A2.976,2.976,0,0,1,12,15Z" transform="translate(-2 -4.999)" fill="#00adef"/></svg>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="d-flex justify-content-between">
                                    <label class="checktainer">Remember Me
                                    <input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                    </label>
                                    <a href="auth_pass_recovery_boxed.html" class="forgot-pass-link">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary dodneon" value="">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    LogIn
                                    </button>                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
    </div>
</div>
@endsection