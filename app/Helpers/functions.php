<?php

function formatDateAndTime($value, $format = 'd/m/Y')
{
	return Carbon\Carbon::parse($value)->format($format);
}

function getInfoAirport($value)
{
	$explode = explode(' - ', $value);
	$idAirport = (int) $explode[0];

	$explode = explode(' / ', $explode[1]);
	$cityName = $explode[0];
	$airportName = $explode[1];

	return [
		'id_airport'	=> $idAirport,
		'name_city'		=> $cityName,
		'name_airport'	=> $airportName
	];
}