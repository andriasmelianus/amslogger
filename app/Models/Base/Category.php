<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $name
 * 
 * @property Collection|Item[] $items
 *
 * @package App\Models\Base
 */
class Category extends Model
{
	protected $table = 'categories';
	public $timestamps = false;

	public function items()
	{
		return $this->hasMany(Item::class);
	}
}
