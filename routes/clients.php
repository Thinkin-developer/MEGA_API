<?php

$router->get('/',  ['uses' => 'ClientController@allClients']);
$router->get('{client}', ['uses' => 'ClientController@getClientId']);