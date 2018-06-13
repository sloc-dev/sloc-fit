<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indirizzo extends Model
{
    
	protected $table = 'indirizzo';
	protected $hidden = ['created_at', 'updated_at'];
	
	public static function store(array $data)
	{
		$indirizzo = self::find(array_get($data, 'id', null));
		if ($indirizzo === null){
			$indirizzo = new Indirizzo();
		}
		
		$indirizzo->indirizzo = array_get($data, 'indirizzo', null);
		$indirizzo->civico = array_get($data, 'civico', null);
		$indirizzo->save();
		
		return $indirizzo;
	}
}
