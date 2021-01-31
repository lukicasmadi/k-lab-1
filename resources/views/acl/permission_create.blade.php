@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-lg-6 col-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                @if ($errors->any())
                    <div class="alert alert-danger custom">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Create Permission</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="{{ route('permission_store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-4">
                            <label>Permission Name</label>
                            <input type="text" class="form-control @error('permission_name') is-invalid @enderror" id="permission_name" name="permission_name" placeholder="Permission Name" autocomplete="off">
                        </div>

                        <input type="submit" name="submit" class="mt-4 mb-4 btn btn-primary" value="Submit">
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('page_css')
<link rel="stylesheet" href="{{ secure_asset('template/custom.css') }}">
@endpush