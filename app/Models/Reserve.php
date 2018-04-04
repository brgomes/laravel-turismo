<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reserve extends Model
{

	protected $fillable = ['user_id', 'flight_id', 'date_reserved', 'status'];

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
