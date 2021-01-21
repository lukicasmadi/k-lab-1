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
                        <div class="col-xl-6 col-md-12 col-sm-12 col-12">
                            <h4>Update Article</h4>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <form method="POST" action="{{ route('article_update', $articleUuid->uuid) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $articleUuid->id }}">
                        <div class="form-group mb-4">
                            <label>Topic</label>
                            <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" placeholder="Topic" autocomplete="off" value="{{ $articleUuid->topic }}">
                        </div>

                        <div class="form-group mb-4">
                            <label>Description</label>
                            <textarea id="desc" name="desc" class="@error('desc') is-invalid @enderror">{{ $articleUuid->desc }}</textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="">== Select Status ==</option>
                                <option value="active" @if ($articleUuid->status == "active") selected @endif>Active</option>
                                <option value="nonactive" @if ($articleUuid->status == "nonactive") selected @endif>Non Active</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label>Category</label>
                            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">== Select Category ==</option>
                                @foreach ($category as $id => $name)
                                    @if ($articleUuid->category_id == $id)
                                        <option value="{{ $id }}" selected>{{ $name }}</option>
                                    @else
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Submit">
                        <a href="{{ route('article_index') }}" class="btn btn-warning mt-3">Back</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('library_css')
<link rel="stylesheet" href="{{ secure_asset('template/plugins/editors/markdown/simplemde.min.css') }}">
@endpush

@push('library_js')
<script src="{{ secure_asset('template/plugins/editors/markdown/simplemde.min.js') }}"></script>
@endpush

@push('page_js')
<script src="{{ secure_asset('js/article.js') }}"></script>
@endpush

@push('page_css')
<link rel="stylesheet" href="{{ secure_asset('template/custom.css') }}">
@endpush