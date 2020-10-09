@extends('layouts.master-admin')

@section('title')
Roles & Permissions
@endsection

@section('stylesheet')
<!-- Datatables css -->
<link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcumb')
<li class="breadcrumb-item" aria-current="page">Roles & Permissions</li>
<li class="breadcrumb-item active" aria-current="">Add</li>
@endsection

@section('pageTitle')
Roles & Permissions
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="header-title">Roles & Permissions</h4>
                    </div>
                </div>
                <hr>
                <div class="tab-content ">
                    <h4 class="header-title" style="text-align: center">{{ Auth::user()->roles()->first()->name }}</h4>

                    <div class="row">
                        
                        @foreach ($grouped as $item => $key)
                            <div class="col-lg-3 mt-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="{{ $item }}">
                                    <label class="custom-control-label" for="{{ $item }}"> {{ $item }}</label>
                                </div>
                                <div class="mt-2 ml-3">

                                    @for($x = 0; $x<count($grouped->get($item)); $x++)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="{{ $key[$x] }}">
                                            <label class="custom-control-label" for="{{ $key[$x] }}">{{ $key[$x] }}</label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                           
                        @endforeach
                    
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('modules.management.user.modal.create')
@include('modules.management.user.modal.edit')
@endsection

@section('scripts')
<!-- third party js -->
<script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/sweetalert/js/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('js/web/main/user/list.js')}}"></script>

<!-- third party js ends -->

@endsection