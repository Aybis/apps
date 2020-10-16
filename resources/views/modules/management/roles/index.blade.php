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
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h4 class="header-title">Management Roles</h4>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center text-sm-right">
                            <a href="#modal" data-toggle="modal" data-set="add" id="add-roles" class="btn btn-primary">
                                <i class=" mdi mdi-account-plus-outline mr-1"></i> Add Roles
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="tab-content ">
                    <table id="table-roles" class="table" width="100%" data-url="{{ url('roles') }}">
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

<x-management.roles.modals >
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control">
                <span class="text-danger" id="name-error"></span>
            </div>
        </div>
        <!-- end col -->

        <div class="col-lg-6">
            <div class="form-group">
                <label for="display">Display</label>
                <input type="text" id="display" class="form-control">
                <span class="text-danger" id="display-error"></span>
            </div>
        </div>
        <!-- end col -->

    </div>
    <button class="btn btn-primary" id="submit">Submit</button>
</x-management.roles.create>
@endsection

@section('scripts')
<!-- third party js -->
<script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/sweetalert/js/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('js/web/main/management/roles/index.js')}}"></script>

<!-- third party js ends -->

@endsection