@if($data->handled_at)
<span class="label label-success">Selesai</span>
@else
<span class="label label-warning">Menunggu</span>
@endif