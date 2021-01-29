<x-print-layout title="Form Stock Opname">

    @foreach($categories AS $category)
    <h2>{{ $category->name }}</h2>

    <div class="column-layout">
        <table border="1">
            <tr>
                <!-- <th>#</th>
                <th>Item</th>
                <th>Sat.</th>
                <th>Fisik</th>
                <th>Selisih</th> -->
                <td>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-1">#</div>
                            <div class="col-sm-4">Item</div>
                            <div class="col-sm-3">Sat.</div>
                            <div class="col-sm-1">Qty</div>
                            <div class="col-sm-3">Selisih</div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php $filteredItems = \DB::table('v_items')->where('category_id', $category->id)->orderBy('name')->get(); ?>
            @foreach($filteredItems AS $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->unit_name }}</td>
                <td>{{ $item->on_hand }}</td>
                <td>_____</td>
            </tr>
            @endforeach
        </table>
    </div>
    <hr>
    @endforeach

    <x-slot name="js"></x-slot>
    <x-slot name="css">
        <style>
            .column-layout {
                columns: 2;
            }

            .column-layout table,
            .column-layout tbody,
            .column-layout tr {
                width: 100%;
                display: block;
            }
        </style>
    </x-slot>
</x-print-layout>