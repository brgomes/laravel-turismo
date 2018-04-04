<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{

	public function user()
	{
		$this->belongsTo(User::class);
	}

	public function flight()
	{
		$this->belongsTo(Flight::class);
	}

}
