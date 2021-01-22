@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-lg-6 col-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                @if ($errors->any())
                    <div class="alert alert-danger">
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
                            <h4>Edit Role</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="{{ route('role_update', $role->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-4">
                            <label>Role Name</label>
                            <input type="text" class="form-control @error('role_name') is-invalid @enderror" id="role_name" name="role_name" placeholder="Role Name" value="{{ $role->name }}" autocomplete="off">
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