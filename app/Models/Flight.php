<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Flight extends Model
{

	protected $fillable = [
		'plane_id',
		'airport_origin_id',
		'airport_destination_id',
		'date',
		'time_duration',
		'hour_output',
		'arrival_time',
		'old_price',
		'price',
		'total_plots',
		'is_promotion',
		'imagem',
		'qty_stops',
		'description'
	];

	public function newFlight(Request $request, $filename)
	{
		$data = $request->all();

		$data['imagem'] = $filename;

		return $this->create($data);
	}

	public function getItens($totalPage)
	{
		return $this->with(['origin', 'destination'])
					->paginate($totalPage);
	}

	public function origin()
	{
		return $this->belongsTo(Airport::class, 'airport_origin_id');
	}

	public function destination()
	{
		return $this->belongsTo(Airport::class, 'airport_destination_id');
	}

	/*public function getDateAttribute($value)
	{
		return Carbon::parse($value)->format('d/m/Y');
	}*/

}
