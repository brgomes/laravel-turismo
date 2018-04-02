<?php

$this->group(['prefix' => 'panel', 'namespace' => 'Panel'], function() {

	$this->any('brands/search', 'BrandController@search')->name('brands.search');
	$this->resource('brands', 'BrandController');

	$this->resource('planes', 'PlaneController');

	$this->get('/', 'PanelController@index')->name('panel');

});

$this->get('/', 'Site\SiteController@index');

$this->get('/promocoes', 'Site\SiteController@promotions')->name('promotions');

Auth::routes();
