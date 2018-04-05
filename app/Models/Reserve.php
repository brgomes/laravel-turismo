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
		$reserves = $this->join('users', 'users.id', '=', 'reserves.user_id')
						->join('flights', 'flights.id', '=', 'reserves.flight_id')
						->select('reserves.*', 'users.name as user_name', 'users.email', 'users.id as user_id', 'flights.id as flight_id', 'flights.date')
						->where(function($query) use ($request) {
							if ($request->user) {
								$dataUser = $request->user;

								$query->where(function($qr) use ($dataUser) {
									$qr->where('users.name', 'LIKE', "%{$dataUser}%");
									$qr->orWhere('users.email', $dataUser);
								});
							}

							if ($request->date) {
								$query->where('flights.date', '=', $request->date);
							}

							if ($request->reserve) {
								$query->where('reserves.id', $request->reserve);
							}
						})
						->where('reserves.status', $request->status)
						//->toSql();
						->paginate($totalPage);

		return $reserves;
	}

}
