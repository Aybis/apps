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
                <div class="tab-content mt-4">
                    <h4 class="header-title" style="text-align: center">{{ $roles->display}}</h4>

                    <form action="">
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
                                            <input type="checkbox" class="custom-control-input" id="{{ $key[$x]['name'] }}">
                                            <label class="custom-control-label"
                                                for="{{ $key[$x]['display'] }}">{{ $key[$x]['display'] }}</label>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            @endforeach
                        </div>
                        <div class="row mt-4">
                                <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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
<script src="{{ asset('js/web/main/management/roles/add-permission.js') }}"></script>

<!-- third party js ends -->

@endsection