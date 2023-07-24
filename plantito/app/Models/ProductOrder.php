<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductOrder
 * 
 * @property int $po_id
 * @property int $order_id
 * @property int $product_id
 * @property int $quantity
 *
 * @package App\Models
 */
class ProductOrder extends Model
{
	protected $table = 'product_orders';
	protected $primaryKey = 'po_id';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'product_id' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'order_id',
		'product_id',
		'quantity'
	];
}
