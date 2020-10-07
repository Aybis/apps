@extends('layouts.master-admin')

@section('title')
SPPH All
@endsection

@section('stylesheet')
<!-- Datatables css -->
<link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcumb')
<li class="breadcrumb-item" aria-current="page">SPPH</li>
<li class="breadcrumb-item active" aria-current="">All</li>
@endsection

@section('pageTitle')
SPPH ALL
@endsection

@section('filterMonthAndYear')
<div class="row justify-content-center">
    <form class="form-inline">

        <div class="form-group mb-2">
            <select class="custom-select" id="month">
                <option value="0">All</option>
            </select>
        </div>
        <div class="form-group mx-sm-1 mb-2">
            <select class="custom-select" id="year">
            </select>
        </div>
    </form>
</div>
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-lg-8">
                        <div class="form-group mb-2">
                            <h4 class="header-title mb-3">All</h4>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-lg-right">
                            <button type="button" class="btn btn-success mb-2 mr-2"><i class="mdi mdi-export mr-1"></i>
                                Export</button>
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="table-responsive ">
                    <table id="list-user" class="table mb-0" width="100%" data-url="{{ url('users') }}">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Nomor SPPH</th>
                                <th>Tanggal SPPH</th>
                                <th>Nomor SPH</th>
                                <th>Tanggal SPH</th>
                                <th>Mitra</th>
                                <th>PIC</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- third party js -->
<script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/sweetalert/js/sweetalert2.all.min.js')}}"></script>
<!-- External JS -->
<script src="{{ asset('js\web\main\spph\all.js') }}"></script>

@endsection
