@props(['approvedAt', 'declinedAt', 'canceledAt'])

@if($approvedAt)
<span class="label label-success">Disetujui</span>
@elseif($declinedAt)
<span class="label label-danger">Ditolak</span>
@elseif($canceledAt)
<span class="label label-default">Dibatalkan</span>
@else
<span class="label label-warning">Menunggu</span>
@endif