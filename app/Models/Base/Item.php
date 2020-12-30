<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Log;
use App\Models\Request;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 * 
 * @property int $id
 * @property string $name
 * @property string|null $name_for_vendor
 * @property int|null $unit_id
 * @property int|null $brand_id
 * @property int|null $category_id
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Brand|null $brand
 * @property Category|null $category
 * @property Unit|null $unit
 * @property Collection|Log[] $logs
 * @property Collection|Request[] $requests
 *
 * @package App\Models\Base
 */
class Item extends Model
{
	protected $table = 'items';

	protected $casts = [
		'unit_id' => 'int',
		'brand_id' => 'int',
		'category_id' => 'int'
	];

	public function brand()
	{
		return $this->belongsTo(Brand::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function unit()
	{
		return $this->belongsTo(Unit::class);
	}

	public function logs()
	{
		return $this->hasMany(Log::class);
	}

	public function requests()
	{
		return $this->hasMany(Request::class);
	}
}
