<div>
    {{ $data->description }}
    <br>
    <span style="font-size: 8pt;">
        Satuan: {{ $data->unit_name ?? '-'}}
        &nbsp;
        Merk: {{ $data->brand_name ?? '-' }}
        &nbsp;
        Kategori: {{ $data->category_name ?? '-' }}
    </span>
</div>