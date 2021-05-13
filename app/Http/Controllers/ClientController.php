<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Get all clients in the db
     *
     * @return json
     */
    public function allClients()
    {
        $clients = Client::all();

        if(count($clients))
            return response()->json($clients, 200);
        else
            return response()->json("not found", 404);
    }
    
    /**
     * Get a client with a specific ID
     *
     * @return json
     */
    public function getClientId($client)
    {
        $client_result = Client::find($client);

        if($client_result)
            return response()->json($client_result, 200);
        else
            return response()->json("not found", 404);
    }
}