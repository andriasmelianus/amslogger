<?php

namespace App\Models;

use App\Models\Base\Item as BaseItem;

class Item extends BaseItem
{
	protected $fillable = [
		'name',
		'name_for_vendor',
		'unit_id',
		'brand_id',
		'category_id',
		'description'
	];
}
