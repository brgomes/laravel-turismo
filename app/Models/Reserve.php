<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Http\Request;

class Reserve extends Model
{

	protected $fillable = ['user_id', 'flight_id', 'date_reserved', 'status'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function flight()
	{
		return $this->belongsTo(Flight::class);
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

	public function search(Request $request, $totalPage)
	{
		/*$this->where(function($query) use ($request) {
			if ($request->date) {

			}
		})->paginate($totalPage);*/

		$reserves = $this->join('users', 'users.id', '=', 'reserves.user_id')
						->join('flights', 'flights.id', '=', 'reserves.flight_id')
						->select('reserves.*', 'users.name as user_name', 'users.email', 'users.id as user_id', 'flights.id as flight_id', 'flights.date')
						->paginate($totalPage);

		return $reserves;
	}

}
