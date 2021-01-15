<?php

namespace App\Models;

use App\Constants\Transaction as ConstantsTransaction;
use App\Constants\User as ConstantsUser;
use App\Models\Base\Transaction as BaseTransaction;

class Transaction extends BaseTransaction
{
	protected $fillable = [
		'type',
		'description',
		'submitted_at',
		'handled_at'
	];

	public function scopeIsFromRequester($query)
	{
		return $query->whereIn('type', ConstantsTransaction::getByUser(ConstantsUser::TYPE_REQUESTER));
	}

	public function scopeIsRequest($query)
	{
		return $query->where('type', ConstantsTransaction::TYPE_REQUEST);
	}

	public function scopeIsUsage($query)
	{
		return $query->where('type', ConstantsTransaction::TYPE_USAGE);
	}

	public function scopeIsStockOpname($query)
	{
		return $query->where('type', ConstantsTransaction::TYPE_STOCK_OPNAME);
	}

	public function scopeIsPurchase($query)
	{
		return $query->where('type', ConstantsTransaction::TYPE_PURCHASE);
	}

	public function scopeIsReturn($query)
	{
		return $query->where('type', ConstantsTransaction::TYPE_RETURN);
	}

	public function scopeIsSubmitted($query)
	{
		return $query->whereNotNull('submitted_at');
	}

	public function scopeIsNotSubmitted($query)
	{
		return $query->whereNull('submitted_at')->whereNull('handled_at');
	}
}
