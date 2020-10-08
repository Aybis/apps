@extends('layouts.master-admin')

@section('title')
Roles
@endsection

@section('stylesheet')
<!-- Datatables css -->
<link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcumb')
<li class="breadcrumb-item" aria-current="page">Roles</li>
<li class="breadcrumb-item active" aria-current="">Data</li>
@endsection

@section('pageTitle')
Roles
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="header-title">Data Roles</h4>
                        <p class="text-muted">Management Roles</p>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center text-sm-right">
                            <a href="#add-user" data-toggle="modal" class="btn btn-primary">
                                <i class=" mdi mdi-account-plus-outline mr-1"></i> Add Roles
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="tab-content ">
                    <table id="table-roles" class="table" width="100%" data-url="{{ route('roles.data') }}" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Display</th>
                                <th></th>
                            </tr>
                        </thead>                        
                    </table>   
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
<script src="{{ asset('js/web/main/management/roles/index.js')}}"></script>

<!-- third party js ends -->

@endsection