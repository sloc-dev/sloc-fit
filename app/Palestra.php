<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Palestra extends Model
{
    protected $table = 'palestra';
	
	public static function getCurrent()
	{
		$palestra = null;
		$user = Auth::user();
		if ($user !== null){
			if ($user->id_tipo_user == TipoUser::PALESTRA){
				$palestra = self::where('id_proprietario', $user->id)->first();
			}
		}
		
		return $palestra;
	}
	
}
