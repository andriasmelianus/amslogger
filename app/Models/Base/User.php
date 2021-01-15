<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Log;
use App\Models\Request;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $role
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Log[] $logs
 * @property Collection|Request[] $requests
 * @property Collection|Transaction[] $transactions
 *
 * @package App\Models\Base
 */
class User extends Model
{
	protected $table = 'users';

	protected $dates = [
		'email_verified_at'
	];

	public function logs()
	{
		return $this->hasMany(Log::class, 'user_id_approver');
	}

	public function requests()
	{
		return $this->hasMany(Request::class);
	}

	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}
}
