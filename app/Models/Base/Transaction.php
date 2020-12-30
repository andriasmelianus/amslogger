<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Log;
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
 * @property Carbon|null $handled_at
 * 
 * @property Collection|Log[] $logs
 *
 * @package App\Models\Base
 */
class Transaction extends Model
{
	protected $table = 'transactions';

	protected $dates = [
		'handled_at'
	];

	public function logs()
	{
		return $this->hasMany(Log::class);
	}
}
