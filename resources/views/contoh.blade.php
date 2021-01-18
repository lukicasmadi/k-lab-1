@extends('layouts.template_admin')

@section('content')
<div class="row layout-top-spacing">

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget-four">
            <div class="widget-heading">
                <h5 class="">Visitors by Browser</h5>
            </div>
            <div class="widget-content">
                <form>
                    <div class="form-group mb-3">
                        <input type="email" class="form-control" id="sEmail" aria-describedby="emailHelp1" placeholder="Email address">
                        <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" class="form-control" id="sPassword" placeholder="Password">
                    </div>
                    <div class="form-group form-check pl-0">
                        <div class="custom-control custom-checkbox checkbox-info">
                            <input type="checkbox" class="custom-control-input" id="sChkbox">
                            <label class="custom-control-label" for="sChkbox">Subscribe to weekly newsletter</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection