@extends('layouts.template_admin')

@section('content')
<div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">
                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        @if (poldaAlreadyInputToday())
                            <div class="grid-polda line glowblue">Sudah Mengirimkan</div>
                        @else
                            <div class="grid-polda line glowred">Belum Mengirimkan</div>
                        @endif
                        <img src="{{ secure_asset('/img/polda/'.poldaImage()->polda->logo) }}" width="50%" style="display: block; margin: 0 auto;">
                    </div>
                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="row">
                                        <div class="widget-heading">
                                            <h5 class="mar20">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <path id="pie_chart_outline" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22ZM11,4.062A8,8,0,1,0,16.419,18.67l-.1.071.094-.065.059-.041.064-.045.016-.011.009-.007-5.128-5.13A1.51,1.51,0,0,1,11,12.379ZM13.829,13l4.227,4.227.007-.008.005-.006-.01.011A7.944,7.944,0,0,0,19.938,13ZM13,4.062V11h6.938A8,8,0,0,0,13,4.062Z" transform="translate(-2 -2)" fill="#00adef"/>
                                            </svg>
                                            <span>TOTAL LAPORAN</span>
                                            </h5>
                                            <p>DATA LAPORAN MINGGUAN</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="row">
                                        <div class="widget-heading">
                                            <h5 class="mar20">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                            <path id="pie_chart_outline" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22ZM11,4.062A8,8,0,1,0,16.419,18.67l-.1.071.094-.065.059-.041.064-.045.016-.011.009-.007-5.128-5.13A1.51,1.51,0,0,1,11,12.379ZM13.829,13l4.227,4.227.007-.008.005-.006-.01.011A7.944,7.944,0,0,0,19.938,13ZM13,4.062V11h6.938A8,8,0,0,0,13,4.062Z" transform="translate(-2 -2)" fill="#00adef"/>
                                            </svg>
                                            <span>TOTAL LAPORAN</span>
                                            </h5>
                                            <p>DATA LAPORAN KESELURUHAN</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <img src="{{ secure_asset('/img/line-polda.png') }}" width="100%">
                            </div>
                        </div>
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection