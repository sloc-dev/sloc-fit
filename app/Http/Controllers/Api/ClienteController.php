<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\JsonController;
use App\Palestra as PalestraModel;
use App\Cliente as ClienteModel;
use Illuminate\Http\Request;

class ClienteController extends JsonController
{

    public function getAll()
    {
		$palestra = PalestraModel::getCurrent();
		if ($palestra !== null){
			return $this->responseSuccess(['clienti' => ClienteModel::getAll($palestra)]);
		} else {
			return $this->responseBadRequest();
		}
    }
	
	public function postSave(Request $request)
    {
		$palestra = PalestraModel::getCurrent();
		if ($palestra !== null){
			ClienteModel::store($palestra, $request);
			return $this->responseSuccess([], 'Salvato');
		} else {
			return $this->responseBadRequest();
		}
    }

}
