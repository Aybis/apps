<!-- Create Role Modal-->

<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" >
        <div class="modal-content">    
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="label">Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>    
            <div class="modal-body">
                <form id="form" class="pl-3 pr-3">                  
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <input type="hidden" id="status" >
                    {{ $slot }}
                    
                </form>
                <!-- end form -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
