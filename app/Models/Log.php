<?php

namespace App\Models;

use App\Models\Base\Log as BaseLog;

class Log extends BaseLog
{
	protected $fillable = [
		'transaction_id',
		'item_id',
		'quantity',
		'price',
		'description',
		'user_id_requester',
		'user_id_approver',
		'approved_at',
		'declined_at',
		'declined_reason',
		'canceled_at'
	];
}
