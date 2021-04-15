@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-lg-6 col-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                @include('flash::message')
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Permission List</h4>
                        </div>
                        <div class="col-md-12 ml-2">
                            <a href="{{ route('permission_create') }}" class="btn btn-success">Add New</a>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th>Permission Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('permission_edit', $permission->id) }}"><i class="fal fa-edit" class="iconSize"></i></a>
                                            <span class="ml-3"></span> <a href="{{ route('permission_delete', $permission->id) }}" id="{{ $permission->id }}" class="delete"><i class="far fa-trash-alt" class="iconSize"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('library_css')
<link href="{{ asset('template/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/sweetalerts/sweetalert2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/components/custom-sweetalert.css') }}" />
@endpush

@push('page_css')
<link rel="stylesheet" href="{{ asset('template/custom.css') }}">
@endpush

@push('library_js')
<script src="{{ asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
@endpush

@push('page_js')
<script>
$(document).ready(function() {
    $('body').on('click', '.delete', function(e) {
        e.preventDefault()
        var id = $(this).attr('id')

        swal({
            title: 'Are you sure?',
            text: "Detele this data!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            padding: '2em',
        }).then(function(result) {
            if (result.value) {
                axios.delete(route('permission_delete', id))
                    .then(function(response) {
                        swal('Deleted!', response.data.output, 'success')
                        setTimeout(function() {
                            location.reload()
                        }, 3000)
                    })
                    .catch(function(error) {
                        swal("Error deleting! Please contact administrator", error.response.data.output, "error")
                        if (error.response) {
                            console.log(error.response.data)
                            console.log(error.response.status)
                            console.log(error.response.headers)
                        } else if (error.request) {
                            console.log(error.request)
                        } else {
                            console.log('Error', error.message)
                        }
                    })
            }
        })
    })
})
</script>
@endpush