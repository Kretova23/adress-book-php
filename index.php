<?php
session_start();

@define('ABSPATH', str_replace('\\', '/', dirname(__FILE__)));

require_once ('vendor/autoload.php');

use \NoahBuscher\Macaw\Macaw;

Macaw::get('/con/(:num)', 'App\ContactController@showContactFromId');
Macaw::get('all', 'Core\CoreController@all');
Macaw::get('count', 'App\ContactController@showCountRecords');


Macaw::get('panel', 'Panel\PanelController@index');
Macaw::get('panel/contact-list', 'Panel\PanelController@showContactList');


Macaw::get('panel/contact/add', 'Panel\PanelController@showContactAdd');
Macaw::post('panel/contact/add', 'Panel\PanelController@addContact');

Macaw::get('panel/contact/edit/(:num)', 'Panel\PanelController@showContactEdit');
Macaw::post('panel/contact/edit', 'Panel\PanelController@editContact');

Macaw::dispatch();
