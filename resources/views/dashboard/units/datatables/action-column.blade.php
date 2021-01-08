<div>
    <div class="btn-group btn-group-sm" role="group">
        <button class="btn btn-icon btn-outline btn-danger" onclick="deleteData(<?php echo $data->id; ?>)"><i class="icon wb-trash"></i></button>
        <a href="{{ route('dashboard.units.update-form', ['id' => $data->id]) }}" class="btn btn-icon btn-outline btn-warning"><i class="icon wb-pencil"></i></a>
    </div>
</div>