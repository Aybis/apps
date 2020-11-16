<div class="table-responsive ">
    <table id="{{ $idTable }}"   {{ $attributes->merge(['class' => 'table mb-0']) }} width="100%" data-url="{{ $dataUrl }}">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                {{ $slot }}
                <th></th>
            </tr>
        </thead>
    </table>
</div>