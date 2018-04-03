<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

	public function search($keySearch)
	{
		return $this->where('name', 'LIKE', "%$keySearch%")
					->orWhere('initials', $keySearch)
					->get();
	}

	public function searchCities($keySearch, $totalPage)
	{
		return $this->cities()
					->where('name', 'LIKE', "%$keySearch%")
					->paginate($totalPage);
	}

	public function cities()
	{
		return $this->hasMany(City::class);
	}

}
