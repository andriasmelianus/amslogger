<?php

namespace App\Models;

use App\Models\Base\Request as BaseRequest;

class Request extends BaseRequest
{
	protected $fillable = [
		'item_id',
		'quantity',
		'description',
		'user_id',
		'handled_at'
	];
}
