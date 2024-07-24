<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property string $transaction_id
 * @property int $quantity
 * @property float $subtotal
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property User $user
 * @property Product $product
 *
 * @package App\Models
 */
class Order extends Model
{
    use HasFactory;
	protected $table = 'orders';

	protected $casts = [
		'user_id' => 'int',
		'product_id' => 'int',
		'quantity' => 'int',
		'subtotal' => 'float'
	];

	protected $fillable = [
		'user_id',
		'product_id',
		'transaction_id',
		'quantity',
		'subtotal'
	];

    public static function search($term)
	{
		// check if search term is like transaction id
		$query = static::where("transaction_id", "LIKE", "%{$term}%");
        return $query;
	}

    public function transactionExists($transaction_id)
    {

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
