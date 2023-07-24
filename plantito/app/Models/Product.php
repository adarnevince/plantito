<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $product_id
 * @property string $name
 * @property float $price
 * @property int $stock
 * @property string $image
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'product';
	protected $primaryKey = 'product_id';
	public $timestamps = false;

	protected $casts = [
		'price' => 'float',
		'stock' => 'int'
	];

	protected $fillable = [
		'name',
		'price',
		'stock',
		'image'
	];
}
