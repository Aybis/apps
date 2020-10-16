<!-- Signup modal-->

<div id="add-user" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" >
        <div class="modal-content">    
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="standard-modalLabel">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>    
            <div class="modal-body">
                <form id="user-add" data-url="{{ url('users') }}" class="pl-3 pr-3">                  
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" id="username" class="form-control">
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control">
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="name" class="form-control">
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="role">Roles</label>
                                <select name="roles" id="role" class="form-control">
                                    <option selected disabled>Pilih Roles</option>
                                    <option value="2">Admin</option>
                                    <option value="3">Guest</option>
                                </select>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="position">Jabatan</label>
                                <input type="text" id="position" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button onclick="submitData()" class="btn btn-primary">Submit</button>
                </form>
                <!-- end form -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
