@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">

        <div class="col-lg-6 col-12  layout-spacing">
            @include('flash::message')
            <div class="statbox widget box box-shadow">

                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-6 col-md-12 col-sm-12 col-12">
                            <h4>Update Password</h4>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <form method="POST" action="{{ route('change_password_process') }}">
                        @csrf

                        <div class="form-group mb-4">
                            <label>Current Password</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" placeholder="Current Password" autocomplete="off" value="">
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>New Password</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" placeholder="New Password" autocomplete="off" value="">
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Confirm New Password</label>
                            <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm New Password" autocomplete="off" value="">
                            @error('new_password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Update">
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection