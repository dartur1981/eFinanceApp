<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SysUser
 * 
 * @property int $su_id
 * @property string $su_user
 * @property string|null $su_name
 * @property int|null $su_group
 * @property int|null $su_status
 * @property string $su_email
 * @property string|null $su_password
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class SysUser extends Model
{
	protected $table = 'sys_users';
	protected $primaryKey = 'su_id';

	protected $casts = [
		'su_group' => 'int',
		'su_status' => 'int'
	];

	protected $hidden = [
		'su_password'
	];

	protected $fillable = [
		'su_user',
		'su_name',
		'su_group',
		'su_status',
		'su_email',
		'su_password'
	];
}
