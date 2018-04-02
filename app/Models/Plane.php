<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{

	protected $fillable = ['qty_passengers', 'class', 'brand_id'];

	public function classes($className = null)
	{
		$classes = [
			'economic'	=> 'Econômica',
			'luxury'	=> 'Luxo'
		];

		if (null === $className) {
			return $classes;
		}

		return $classes[$className];
	}

	public function brand()
	{
		return $this->belongsTo(Brand::class);
	}

}
