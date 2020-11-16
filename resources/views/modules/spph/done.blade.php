<x-layouts.spph page="All">
    @push('styling')
    <!-- Datatables css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-lg-8" >
                            <div class="form-group mb-2">
                                <h4 class="header-title mb-3">Done</h4>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-lg-right">
                                <button type="button" class="btn btn-success mb-2 mr-2"><i class="mdi mdi-export mr-1"></i>
                                    Export</button>
                                </div>
                            </div><!-- end col-->
                        </div>
                        <form method="POST" action="{{ route('spph.store') }}" enctype="multipart/form-data" class="form" id="form">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="tanggal_spph" class="col-3 col-form-label">Tanggal SPPH</label>
                                <div class="col-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control datejos" data-date="" data-date-format="yyyy-mm-dd"
                                            class="form-control datejos" data-date-autoclose="true" autocomplete="off"
                                            id="tanggal_spph" name="tanggal_spph" value="{{ old('tanggal_spph') }}">
            
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class=" mdi mdi-calendar-month"></i></span>
                                        </div>
                                    </div>
            
                                    @error('tanggal_spph')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
            
                                </div>
                            </div> <!-- end form group tanggal spph-->
            
                            <div class="form-group row mb-3">
                                <label for="nomor_spph" class="col-3 col-form-label">Nomor SPPH</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" id="nomor_spph" data-old="{{ old('nomor_spph') }}"
                                        name="nomor_spph" value="{{ old('nomor_spph') }}">
                                    @error('nomor_spph')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div> <!-- end form group nomor spph-->
            
                            <div class="form-group row mb-3">
                                <label for="tanggal_sph" class="col-3 col-form-label">Tanggal SPH</label>
                                <div class="col-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control datepick" data-date-autoclose="true" id="tanggal_sph"
                                            autocomplete="off" name="tanggal_sph" value="{{ old('tanggal_sph') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class=" mdi mdi-calendar-month"></i></span>
                                        </div>
                                    </div>
                                    @error('tanggal_sph')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div> <!-- end form group tanggal sph-->
            
                            <div class="form-group row mb-3">
                                <label for="mitra" class="col-3 col-form-label">Mitra</label>
                                <div class="col-9">
                                    <div class="input-group">
                                        <input type="text" id="nama_mitra" class="form-control" name="nama_mitra" readonly
                                            value="{{ old('nama_mitra') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-btn input-group-append">
                                                <button class="btn btn-primary bootstrap-touchspin-up" data-toggle="modal"
                                                    data-target="#modal" type="button">Pilih</button>
                                            </span>
                                        </div>
                                    </div>
                                    @error('mitra_id')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                    <input type="hidden" id="mitra_id" name="mitra_id" value="{{ old('mitra_id') }}">
                                </div>
                            </div> <!-- end form group mitra-->
            
                            <div class="form-group row mb-3">
                                <label for="penanggung_jawab" class="col-3 col-form-label">Penanda Tangan</label>
                                <div class="col-9">
                                    <select class="form-control " data-old="{{ old('penanggung_jawab') }}" name="penanggung_jawab"
                                        id="penanggung_jawab" data-url="{{ route('users.data') }}">
                                        <option value="" disabled selected>Pilih Atasan</option>
                                    </select>
                                    @error('penanggung_jawab')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div> <!-- end form group penanggung jawab-->
            
                            <div class="form-group row mb-3">
                                <label for="judul" class="col-3 col-form-label">Judul</label>
                                <div class="col-9">
                                    <textarea name="judul" id="judul" class="form-control">{{ old('judul') }}</textarea>
                                    @error('judul')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div> <!-- end form group mitra-->
            
                            <div class="col-lg-12 mb-3 mt-2" style="text-align: center">
                                <hr>
                                <h3>PREVIEW</h3>
                            </div> <!-- end div preview -->
            
                            <div class="col-lg-12 mb-3">
                                <textarea id="froala" name="isi">
                                    @if (old('isi') == null)
                                      <x-spph-create></x-spph-create>
                                        @else 
                                        {{ old('isi') }}
                                    @endif
                                </textarea>
                            </div> <!-- end div textarea preview -->
            
                            <div class="form-group row mb-3">
                                <label for="lampiran" class="col-3 col-form-label">Lampiran</label>
                                <div class="col-9">
                                    <input type="file" name="document[]" class="form-control" multiple="multiple">
                                    <input type="hidden" name="type" value="lampiran">
                                </div>
                            </div> <!-- end form group lampiran-->
        
        
                            <button type="submit" name="status" value="draft" class="btn btn-success" style="width: 7em;">Save
                            </button>
                            <button type="submit" name="status" value="save" class="btn btn-primary" style="width: 7em;">Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @push('scripts')
        <!-- third party js -->
        <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('assets/sweetalert/js/sweetalert2.all.min.js')}}"></script>
        <script>
            $('table').dataTable();
        </script>
        @endpush
</x-layouts.spph>