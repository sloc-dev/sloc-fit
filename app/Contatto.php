<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contatto extends Model
{
	
    protected $table = 'contatto';
	protected $hidden = ['created_at', 'updated_at'];
	
	public static function store(array $data)
	{
		$contatto = self::find(array_get($data, 'id', null));
		if ($contatto === null){
			$contatto = new Contatto();
		}
		
		$contatto->telefono = array_get($data, 'telefono', null);
		$contatto->cellulare = array_get($data, 'cellulare', null);
		$contatto->email = array_get($data, 'email', null);
		$contatto->pec = array_get($data, 'pec', null);
		$contatto->save();
		
		return $contatto;
	}
	
}
