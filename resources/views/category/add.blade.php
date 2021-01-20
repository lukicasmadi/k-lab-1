@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">

        <div class="col-lg-6 col-12  layout-spacing">
            <div class="statbox widget box box-shadow">

                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-6 col-md-12 col-sm-12 col-12">
                            <h4>Input Category</h4>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <form method="POST" action="{{ route('category_add') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <label>Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" autocomplete="off" value="{{ old('name') }}">
                        </div>
                        <div class="form-group mb-4">
                            <label>Image (Leave blank if you don't want to use an image)</label>
                            <input type="file" class="form-control" id="image" name="image" @error('image') is-invalid @enderror>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Submit">
                        <a href="{{ route('category_index') }}" class="btn btn-warning mt-3">Back</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection