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

	$this->get('reserves/search', 'ReserveController@search')->name('reserves.search');
	$this->resource('reserves', 'ReserveController', [
		//'only => [],'
		'except' => ['show', 'destroy']
	]);

	$this->get('/', 'PanelController@index')->name('panel');

});

$this->group(['middleware' => 'auth'], function() {

	$this->get('detalhes-voo/{id}', 'Site\SiteController@detailsFlight')->name('details.flight');

	$this->post('reservar', 'Site\SiteController@reserveFlight')->name('reserve.flight');

	$this->get('minhas-compras', 'Site\SiteController@myPurchases')->name('my.purchases');

	$this->get('detalhes-compra/{id}', 'Site\SiteController@purchaseDetail')->name('purchase.detail');

	$this->get('meu-perfil', 'Panel\UserController@myProfile')->name('my.profile');

	$this->post('atualizar-perfil', 'Panel\UserController@updateProfile')->name('update.profile');

	$this->get('sair', 'Site\SiteController@logout')->name('logout.user');

});

$this->get('/', 'Site\SiteController@index')->name('home');

$this->post('pesquisar', 'Site\SiteController@search')->name('search.flights.site');

$this->get('promocoes', 'Site\SiteController@promotions')->name('promotions');

Auth::routes();
