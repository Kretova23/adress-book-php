<?php
session_start();

@define('ABSPATH', str_replace('\\', '/', dirname(__FILE__)));

require_once ('vendor/autoload.php');

use \NoahBuscher\Macaw\Macaw;

Macaw::get('/con/(:num)', 'App\ContactController@showContactFromId');
Macaw::get('user', 'App\ContactController@showContactList');

Macaw::get('all', 'Core\CoreController@all');
Macaw::get('count', 'App\ContactController@showCountRecords');

Macaw::post('/panel/login', 'Core\ServiceController@login');
//Macaw::get('/panel/login', 'Panel\PanelController@login');
Macaw::get('/panel/logout', 'Panel\PanelController@logout');

Macaw::get('panel', 'Panel\PanelController@index');
Macaw::get('panel/contact-list', 'Panel\PanelController@showContactList');

Macaw::get('panel/archive', 'Panel\PanelController@showArchive');
Macaw::get('panel/contact/move/(:num)', 'Panel\PanelController@moveArchive');


Macaw::get('panel/contact/add', 'Panel\PanelController@showContactAdd');
Macaw::post('panel/contact/add', 'Panel\PanelController@addContact');

Macaw::get('panel/contact/edit/(:num)', 'Panel\PanelController@showContactEdit');
Macaw::post('panel/contact/edit', 'Panel\PanelController@editContact');

Macaw::get('panel/contact/delete/(:num)', 'Panel\PanelController@deleteContact');



Macaw::dispatch();
