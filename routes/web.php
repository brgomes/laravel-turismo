<?php

$this->get('/panel', 'Panel\PanelController@index');

$this->get('/', 'Site\SiteController@index');
$this->get('/promocoes', 'Site\SiteController@promotions')->name('promotions');

Auth::routes();
