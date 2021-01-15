<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Log;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 * 
 * @property int $id
 * @property string $type
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $submitted_at
 * @property Carbon|null $handled_at
 * @property int $user_id
 * 
 * @property User $user
 * @property Collection|Log[] $logs
 *
 * @package App\Models\Base
 */
class Transaction extends Model
{
	protected $table = 'transactions';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $dates = [
		'submitted_at',
		'handled_at'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function logs()
	{
		return $this->hasMany(Log::class);
	}
}
