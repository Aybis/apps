@extends('layouts.master-admin')

@section('title')
  Karyawan
@endsection

@section('stylesheet')
    <!-- Datatables css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcumb')
    <li class="breadcrumb-item" aria-current="page">Karyawan</li>
    <li class="breadcrumb-item active" aria-current="">Data</li>
@endsection

@section('pageTitle')
    Karyawan
@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <h4 class="header-title">Data Karyawan</h4>
                            <p class="text-muted">Management Karyawan</p>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-center text-sm-right">
                                <a href="#add-user" data-toggle="modal" class="btn btn-primary">
                                    <i class=" mdi mdi-account-plus-outline mr-1"></i> Add Karyawan
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- <hr> --}}
                    <div class="tab-content ">
                        <table id="list-user" class="table" width="100%" data-url="{{ route('users.data') }}" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Jabatan</th>
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
  <script src="{{ asset('js/web/main/user/list.js')}}"></script>

  <!-- third party js ends -->

@endsection

