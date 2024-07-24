<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Supplier
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property int|null $artist_id
 *
 * @property Artistprofile|null $artistprofile
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Supplier extends Model
{
	use HasFactory;
	protected $table = 'suppliers';
	public $timestamps = false;

	protected $casts = [
		'artist_id' => 'int'
	];

	protected $fillable = [
		'supplier_name',
		'email',
		'phone',
		'address',
		'artist_id'
	];

    public static function search($term)
	{
		// check if search term is like supplier name or email
		$query = static::where("supplier_name", "LIKE", "%{$term}%")
                            ->orWhere("email", "LIKE", "%{$term}%");
        return $query;
	}

	public function artistprofile()
	{
		return $this->belongsTo(Artistprofile::class, 'artist_id');
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
