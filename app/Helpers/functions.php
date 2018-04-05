<?php

function formatDateAndTime($value, $format = 'd/m/Y')
{
	return Carbon\Carbon::parse($value)->format($format);
}

function getInfoAirport($city)
{
	$explodeCity = explode(' - ', $city);
	$idCity = (int) $explodeCity[0];

	$explodeCity = explode(' / ', $explodeCity[1]);
	$cityName = $explodeCity[0];
	$airportName = $explodeCity[1];

	return [
		'id_city' 		=> $idCity,
		'name_city'		=> $cityName,
		'name_airport'	=> $airportName
	];
}