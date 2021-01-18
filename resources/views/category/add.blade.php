@extends('layouts.template_admin')

@section('content')
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
                <form>
                    <div class="form-group mb-4">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Image</label>
                        <input type="text" class="form-control" id="image" name="image" placeholder="Image">
                    </div>
                    <input type="submit" name="time" class="btn btn-primary mt-3" value="Submit">
                </form>
            </div>
        </div>
    </div>

</div>
@endsection