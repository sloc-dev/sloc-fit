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
  
  	public function getCount()
    {
		$palestra = PalestraModel::getCurrent();
		if ($palestra !== null){
			return $this->responseSuccess(['count' => ClienteModel::countAll($palestra)]);
		} else {
			return $this->responseBadRequest();
		}
    }
	
	public function getLasts($limit = 5)
    {
		$palestra = PalestraModel::getCurrent();
		if ($palestra !== null){
			return $this->responseSuccess(['clienti' => ClienteModel::getLasts($palestra, $limit)]);
		} else {
			return $this->responseBadRequest();
		}
    }
	
	public function postSave(Request $request)
    {
		$palestra = PalestraModel::getCurrent();
		if ($palestra !== null){
			$cliente = ClienteModel::store($palestra, $request);
			return $this->responseSuccess(['id' => $cliente->id], 'Salvato');
		} else {
			return $this->responseBadRequest();
		}
    }

}
