<?php

$this->group(['prefix' => 'panel', 'namespace' => 'Panel'], function() {
	$this->get('/', 'PanelController@index')->name('panel');
	$this->resource('brands', 'BrandController');
});

$this->get('/', 'Site\SiteController@index');
$this->get('/promocoes', 'Site\SiteController@promotions')->name('promotions');

Auth::routes();
