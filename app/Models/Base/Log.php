<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Item;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Log
 * 
 * @property int $id
 * @property int $transaction_id
 * @property int $item_id
 * @property int $quantity
 * @property float|null $price
 * @property string|null $description
 * @property int $user_id_requester
 * @property int|null $user_id_approver
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $approved_at
 * @property Carbon|null $declined_at
 * @property string|null $declined_reason
 * @property Carbon|null $canceled_at
 * 
 * @property Transaction $transaction
 * @property Item $item
 * @property User|null $user
 *
 * @package App\Models\Base
 */
class Log extends Model
{
	protected $table = 'logs';

	protected $casts = [
		'transaction_id' => 'int',
		'item_id' => 'int',
		'quantity' => 'int',
		'price' => 'float',
		'user_id_requester' => 'int',
		'user_id_approver' => 'int'
	];

	protected $dates = [
		'approved_at',
		'declined_at',
		'canceled_at'
	];

	public function transaction()
	{
		return $this->belongsTo(Transaction::class);
	}

	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id_approver');
	}
}
