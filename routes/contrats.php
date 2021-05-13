<?php

$router->get('/',  ['uses' => 'ContratController@allContrats']);
$router->get('client/{client}',  ['uses' => 'ContratController@allContratsClientId']);
$router->get('{contrat}/client/{client}',  ['uses' => 'ContratController@getContratClientId']);
$router->post('{contrat}',  ['uses' => 'ContratController@updateContratId']);