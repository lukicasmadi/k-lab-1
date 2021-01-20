@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">

        <div class="col-lg-6 col-12  layout-spacing">
            <div class="statbox widget box box-shadow">

                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-6 col-md-12 col-sm-12 col-12">
                            <h4>Input Article</h4>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <form method="POST" action="{{ route('article_add') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label>Topic</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="topic" name="topic" placeholder="Name" autocomplete="off" value="{{ old('topic') }}">
                        </div>

                        <div class="form-group mb-4">
                            <label>Description</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="desc" name="desc" placeholder="Name" autocomplete="off" value="{{ old('desc') }}">
                        </div>

                        <div class="form-group mb-4">
                            <label>Status</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="status" name="status" placeholder="Name" autocomplete="off" value="{{ old('status') }}">
                        </div>

                        <div class="form-group mb-4">
                            <label>Category</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="category_id" name="category_id" placeholder="Name" autocomplete="off" value="{{ old('category_id') }}">
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