@extends('layouts.master-admin')

@section('title')
Create
@endsection

@section('stylesheet')
<!-- Datatables css -->
<link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<!-- Froala -->
<link href='https://cdn.jsdelivr.net/npm/froala-editor@3.2.0/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />


<style>
    .capitalize {
        text-transform: capitalize;
    }

    .select2-container-multi .select2-choices .select2-search-choice {
        padding: 5px 5px 5px 18px;
    }
</style>
@endsection

@section('breadcumb')
<li class="breadcrumb-item" aria-current="page">LPL</li>
<li class="breadcrumb-item active" aria-current="">Create</li>
@endsection

@section('pageTitle')
Create LPL
@endsection

@section('contents')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary text-white text-center" style="border-radius: 10px">
                <h3>PIC - {{ Auth::user()->name }}</h3>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-12">
        <div class="card " style="border-radius: 10px">
            <div class="card-body">
                <form id="lpls_form" data-url="" class="form-horizontal">
                    @csrf
                    <div class="row">                    

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label>Tanggal SPPH</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" data-date="" data-date-format="yyyy-mm-dd" data-provide="datepicker" data-date-autoclose="true" id="tanggal_spph" name="tanggal_spph" value="{{ old('tanggal_spph') }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class=" mdi mdi-calendar-month"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label>Nomor SPPH</label>
                                <input type="text" class="form-control" id="nomor_spph" name="nomor_spph" value="{{ old('nomor_spph') }}">
                            </div>
                        </div> <!-- end col -->

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label>Nomor SPH</label>
                                <input type="text" class="form-control" id="nomor_sph" name="nomor_sph" value="{{ old('nomor_sph') }}">
                            </div>
                        </div> <!-- end col -->

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label>Tanggal dan Jam SPH</label>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control" data-date="" data-date-format="yyyy-mm-dd" data-provide="datepicker" data-date-autoclose="true" id="tanggal_sph" name="tanggal_sph" value="{{ old('tanggal_sph') }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class=" mdi mdi-calendar-month"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control" data-toggle='timepicker' data-show-meridian="false">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar-clock"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                         

                           
                        </div> <!-- end col -->

                     

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label>Mitra</label>
                                <input type="text" class="form-control" id="mitra" name="mitra"  value="{{ old('mitra') }}" >
                            </div>
                        </div> <!-- end col -->

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label>Penanggung Jawab</label>
                                <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" value="{{ old('penanggung_jawab') }}" >
                            </div>
                        </div> <!-- end col -->

                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label>Judul</label>
                                <textarea name="judul" id="judul" class="form-control" rows="3">{{ old('judul') }}
                                </textarea>
                            </div>
                        </div> <!-- end col -->

                       <div class="col-lg-12 mb-3" style="text-align: center">
                        <h3>PREVIEW</h3>
                        <hr>
                       </div>

                        <div class="col-lg-12 mb-3">
                          <textarea id="froala">
                            <x-spph-create></x-spph-create>
                          </textarea>
                        </div>
                    </div>
                    <!-- end row -->

                    <button onclick="submitData()" class="btn btn-primary">Submit</button>
                </form>
                <!-- end form -->

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->

</div>
<!-- end row -->
@endsection

@section('scripts')
<!-- External JS -->
<script src="{{ asset('js\web\main\spph\create.js') }}"></script>
<!-- Froala -->
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@3.2.0/js/froala_editor.pkgd.min.js'></script>
<script>
    new FroalaEditor('#froala', {
        heightMin : 200,
    })
</script>
@endsection
