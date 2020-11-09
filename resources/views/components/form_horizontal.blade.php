<div class="card-body">
    <form id="{{ $id }}" method="{{ $method }}" action="{{ $action }}" data-url="{{ $url }}" class="form-horizontal" enctype="multipart/form-data">
        @csrf
      
        {{ $slot }}
        <button type="submit" name="status" value="Save" class="btn btn-primary">Save</button>
        <button type="submit" name="status" value="Draft" class="btn btn-success">Draft</button>
    </form>
    <!-- end form -->

</div> <!-- end card-body -->