<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Client;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    /**
     * Get all contrats in the db
     *
     * @return json
     */
    public function allContrats()
    {
        $contrats = Contrat::all();

        if(count($contrats))
            return response()->json($contrats, 200);
        else
            return response()->json("not found", 404);
        
    }

    /**
     * Get all contrats from a specific client
     *
     * @return json
     */
    public function allContratsClientId($client)
    {
        $client_result = Client::find($client);
        
        if($client_result)
        {
            $contrats = $client_result->contrats;

            if(count($contrats))
                return response()->json($contrats, 200);
            else
                return response()->json("Contrats not found", 404);
        }
        else
            return response()->json("Client not found", 404);
    }
    
    /**
     * Get a contrat from a specific client
     *
     * @return json
     */
    public function getContratClientId($contrat, $client)
    {
        $client_result = Client::find($client);

        if($client_result)
        {
            $contrat_result = $client_result->contrats->find($contrat);

            if($contrat_result)
                return response()->json($contrat_result, 200);
            else
                return response()->json("Contrat not found", 404);
        }
        else
            return response()->json("Client not found", 404);
    }

    /**
     * Update a contrat
     *
     * @return json
     */
    public function updateContratId(Request $request, $contrat)
    {
        $contrat_result = Contrat::findOrFail($contrat);
        
        if($contrat_result->update($request->all()))
            return response()->json($contrat_result, 200);
        else
            return response()->json("Update failed", 422);
    }
}