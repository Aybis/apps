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
<x-items.filter-date></x-items.filter-date>
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        {{ $slot }}
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
