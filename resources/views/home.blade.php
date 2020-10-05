@extends('layouts.master-admin')

@section('title')
Dashboard
@endsection

@section('stylesheet')
<!-- Datatables css -->
<link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcumb')
<li class="breadcrumb-item" aria-current="page">Dashboard</li>
@endsection

@section('pageTitle')
Dashboard
@endsection

@section('contents')
<div class="row">

    <div class="col-lg-3">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-right">
                    <i class="mdi mdi-account-multiple widget-icon"></i>
                </div>
                <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">SPPH</h5>
                <h3 class="mt-3 mb-3">36,254</h3>
                <p class="mb-0 text-muted">
                    <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div>
    <!-- end col-lg-6 -->

    <div class="col-lg-3">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-right">
                    <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                </div>
                <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">BAKN</h5>
                <h3 class="mt-3 mb-3">5,543</h3>
                <p class="mb-0 text-muted">
                    <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-lg-3">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-right">
                    <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                </div>
                <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">BAK</h5>
                <h3 class="mt-3 mb-3">5,543</h3>
                <p class="mb-0 text-muted">
                    <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->


    <div class="col-lg-3">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-right">
                    <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                </div>
                <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">KONTRAK</h5>
                <h3 class="mt-3 mb-3">5,543</h3>
                <p class="mb-0 text-muted">
                    <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->


</div> <!-- end row -->
@endsection

@section('scripts')
<!-- third party js -->
<script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/sweetalert/js/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('js/web/main/home.js')}}"></script>

<!-- third party js ends -->

@endsections