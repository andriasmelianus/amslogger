<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Unit
 * 
 * @property int $id
 * @property string $name
 * @property string|null $deleted_at
 * 
 * @property Collection|Item[] $items
 *
 * @package App\Models\Base
 */
class Unit extends Model
{
	use SoftDeletes;
	protected $table = 'units';
	public $timestamps = false;

	public function items()
	{
		return $this->hasMany(Item::class);
	}
}
