<?php

$this->group(['prefix' => 'panel', 'namespace' => 'Panel'], function() {

	$this->any('brands/search', 'BrandController@search')->name('brands.search');
	$this->any('brands/{id}/planes', 'BrandController@planes')->name('brands.planes');
	$this->resource('brands', 'BrandController');

	$this->any('planes/search', 'PlaneController@search')->name('planes.search');
	$this->resource('planes', 'PlaneController');

	$this->get('states/search', 'StateController@search')->name('states.search');
	$this->get('states', 'StateController@index')->name('states.index');

	$this->get('state/{initials}/cities/search', 'CityController@search')->name('state.cities.search');
	$this->get('state/{initials}/cities', 'CityController@index')->name('state.cities');

	$this->get('flights/search', 'FlightController@search')->name('flights.search');
	$this->resource('flights', 'FlightController');

	$this->get('city/{id}/airports/search', 'AirportController@search')->name('airports.search');
	$this->resource('city/{id}/airports', 'AirportController');

	$this->get('users/search', 'UserController@search')->name('users.search');
	$this->resource('users', 'UserController');

	$this->resource('reserves', 'ReserveController', [
		//'only => [],'
		'except' => ['show', 'destroy']
	]);

	$this->get('/', 'PanelController@index')->name('panel');

});

$this->get('/', 'Site\SiteController@index');

$this->get('/promocoes', 'Site\SiteController@promotions')->name('promotions');

Auth::routes();
