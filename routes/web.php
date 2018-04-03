<?php

$this->group(['prefix' => 'panel', 'namespace' => 'Panel'], function() {

	$this->any('brands/search', 'BrandController@search')->name('brands.search');
	$this->any('brands/{id}/planes', 'BrandController@planes')->name('brands.planes');
	$this->resource('brands', 'BrandController');

	$this->any('planes/search', 'PlaneController@search')->name('planes.search');
	$this->resource('planes', 'PlaneController');

	$this->any('states/search', 'StateController@search')->name('states.search');
	$this->get('states', 'StateController@index')->name('states.index');

	$this->get('/', 'PanelController@index')->name('panel');

});

$this->get('/', 'Site\SiteController@index');

$this->get('/promocoes', 'Site\SiteController@promotions')->name('promotions');

Auth::routes();
