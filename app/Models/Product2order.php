<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product2order
 * 
 * @property int $id
 * @property int $product_id
 * @property int $order_id
 * 
 * @property Order $order
 * @property Product $product
 *
 * @package App\Models
 */
class Product2order extends Model
{
	protected $table = 'product2order';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'order_id' => 'int'
	];

	protected $fillable = [
		'product_id',
		'order_id'
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
