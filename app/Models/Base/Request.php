<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Item;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Request
 * 
 * @property int $id
 * @property int $item_id
 * @property int|null $quantity
 * @property string|null $description
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $handled_at
 * 
 * @property Item $item
 * @property User $user
 *
 * @package App\Models\Base
 */
class Request extends Model
{
	protected $table = 'requests';

	protected $casts = [
		'item_id' => 'int',
		'quantity' => 'int',
		'user_id' => 'int'
	];

	protected $dates = [
		'handled_at'
	];

	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
