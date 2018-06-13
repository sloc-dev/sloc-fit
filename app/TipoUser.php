<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUser extends Model
{
    protected $table = 'tipo_user';
	
	const ADMIN = 1;
	const PALESTRA = 2;
	const CLIENTE = 3;
	
}
