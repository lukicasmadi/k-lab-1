@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>ADD PERMISSION</span>
    </h3>
</div>
@endpush

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
<link rel="stylesheet" href="{{ asset('template/custom.css') }}">
@endpush