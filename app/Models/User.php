<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Artistprofile[] $artistprofiles
 * @property Collection|Cart[] $carts
 * @property Enquiry $enquiry
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class User extends Authenticatable
{

    /**
     * @var string The username Name of the main site admin user account
     */
    const SITE_ADMIN_NAME = "Site-Admin";

    /**
     * @var string The username email address of the main site admin user account
     */
    const SITE_ADMIN_EMAIL = "admin@recordchew.com";

    use HasApiTokens, HasFactory, Notifiable;
	protected $table = 'users';

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
        'role_id',
        'enquiry',
		'remember_token'
	];

    public static function search($term)
	{
		// check if search term is like user name, or email
		$query = static::where("name", "LIKE", "%{$term}%")
                    ->orWhere("email", "LIKE", "%{$term}%");
        return $query;
	}


	public function artistprofile()
	{
		return $this->hasOne(Artistprofile::class);
	}

	public function carts()
	{
		return $this->hasOne(Cart::class);
	}

	public function role()
	{
		return $this->hasOne(Role::class);
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}


}
