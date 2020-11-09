<!-- Create Modal -->

<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-full-width" >
        <div class="modal-content">    
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="label">{{ $modalId }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>    
            <div class="modal-body">
             <table id="{{ $tableId }}" data-url="{{ $tableUrl }}" class="table" width="100%">
                {{ $slot }}
             </table>
                <!-- end form -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
