<?php

namespace App\Http\Controllers;

class JsonController extends Controller
{

	public function responseSuccess($data = [], $response_msg = 'Richiesta effettuata con successo')
	{
		return response()->json(['code' => 200, 'response' => $response_msg, 'data' => $data]);
	}
	
	public function responseBadRequest($response_msg = 'Richiesta errata')
	{
		return response()->json(['code' => 400, 'response' => $response_msg], 400);
	}
  
  	public function responseInternalError($response_msg = 'Errore interno')
	{
		return response()->json(['code' => 500, 'response' => $response_msg], 500);
	}
	
}
