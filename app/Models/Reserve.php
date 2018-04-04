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

	public function status($status = null)
	{
		$statusAvailable = [
			'reserved' 	=> 'Reservado',
			'canceled'	=> 'Cancelado',
			'paid'		=> 'Pago',
			'conclued'	=> 'Concluído'
		];

		if (isset($status)) {
			return $statusAvailable[$status];
		}

		return $statusAvailable;
	}

}
