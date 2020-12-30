<?php

namespace App\Models;

use App\Models\Base\Transaction as BaseTransaction;

class Transaction extends BaseTransaction
{
	protected $fillable = [
		'type',
		'description',
		'handled_at'
	];
}
