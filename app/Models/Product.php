<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Product
 *
 * @property int $id
 * @property string $name
 * @property string $artist_name
 * @property string $artwork
 * @property string $genre
 * @property string $medium
 * @property Carbon $publication_date
 * @property float $retail_price
 * @property float $trade_price
 * @property int $supplier_id
 *
 * @property Supplier $supplier
 * @property Collection|Cart[] $carts
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Product extends Model
{
	use HasFactory;
	protected $table = 'products';
	public $timestamps = false;

	protected $casts = [
		'retail_price' => 'float',
		'trade_price' => 'float',
		'supplier_id' => 'int'
	];

	protected $dates = [
		'publication_date'
	];

	protected $fillable = [
		'product_name',
		'artist_name',
		'artwork',
		'genre',
		'medium',
		'stock',
		'publication_date',
		'retail_price',
		'hot_product',
		'trade_price',
		'supplier_id'
	];

    /**
     * Get a list of the most recently ordered products
     *
     * @param int $limit Limit the number of product results, defaults to 5.
	 * @return Collection The top most ordered products
     */
    public static function getHot($limit=5)
    {
        $query = static::query()
                    ->where("hot_product", true);
        if(!is_null($limit) && $limit >=1) {
            $query->limit($limit);
        }
        return $query->get();
    }

    public static function search($term)
	{
		// check if search term is like artist name or artist description
        // using variable extraction - expands the variable to a string inside the string wrapped in % because its a like
		$query = static::where("product_name", "LIKE", "%{$term}%")
                        ->orWhere("artist_name", "LIKE", "%{$term}%")
                        ->orWhere("medium", "LIKE", "%{$term}%")
                        ->orWhere("genre", "LIKE", "%{$term}%");
        return $query;
	}

	public function supplier()
	{
		return $this->belongsTo(Supplier::class);
	}

	public function carts()
	{
		return $this->hasMany(Cart::class);
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
