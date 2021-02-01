@extends('layouts.template_login')

@section('content')
<div class="form-container outer">
<img style="display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 50px;
  margin-bottom: 25px;
  width: 125px;" src="{{ asset('/img/korlantas.png') }}">
    <div style="margin-top: 18px; text-align: center;">
        <h1 class="" style="font-size: 30px; color: #00adef; letter-spacing: 1px;">SISTEM PELAPORAN [BERTHO UPDATE]</h1>
        <h1 class="" style="font-size: 30px;  color: #00adef; letter-spacing: 1px;">OPERASI ONLINE BIDANG LALU LINTAS KORLANTAS POLRI</h1>
        <p class="" style="font-size: 20px; letter-spacing: 1px; text-transform: uppercase;">[ Giat Operasi Ketupat ]</p>
    </div>
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">

                    <form method="POST" action="{{ route('login') }}" class="text-left">
                        @csrf
                        <div class="form">

                            <div id="username-field" class="field-wrapper input">
                                <!-- <label for="username">{{ __('E-Mail Address') }}</label> -->
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> -->
                                <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" placeholder="email@domain.com">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div id="password-field" class="field-wrapper input mb-2">
                                <!-- <div class="d-flex justify-content-between">
                                    <label for="password">{{ __('Password') }}</label>
                                    <a href="auth_pass_recovery_boxed.html" class="forgot-pass-link">Forgot Password?</a>
                                </div> -->
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> -->
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> -->
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">LogIn Here</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection