<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cliente extends Model
{
    protected $table = 'cliente';	
	protected $fillable = ['nome', 'cognome', 'codice_fiscale', 'data_nascita'];	
	protected $hidden = ['id_palestra', 'id_indirizzo', 'id_contatto', 'created_at', 'updated_at', 'deleted_at'];
	protected $appends = ['indirizzo', 'contatto'];
	
	public static function getAll(Palestra $palestra){
		return self::where('id_palestra', $palestra->id)->orderBy('cognome', 'desc')->get();
	}
	
	public function getDataNascitaAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function setDataNascitaAttribute($value)
    {
		if ($value !== null){
			$this->attributes['data_nascita'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value)->toDateString();
		}        
    }
	
	public function getIndirizzoAttribute()
	{
		return Indirizzo::find($this->attributes['id_indirizzo']);
	}
	
	public function getContattoAttribute()
	{
		return Contatto::find($this->attributes['id_contatto']);
	}
	
	public static function store(Palestra $palestra, Request $request)
	{
		$cliente = self::find($request->id);
		if ($cliente === null){
			$cliente = new Cliente();
		}
		
		if ($request->contatto !== null){
			$contatto = Contatto::store($request->contatto);
			$cliente->id_contatto = $contatto->id;
		}
		
		if ($request->indirizzo !== null){
			$indirizzo = Indirizzo::store($request->indirizzo);
			$cliente->id_indirizzo = $indirizzo->id;
		}
		
		$cliente->id_palestra = $palestra->id;
		$cliente->nome = $request->nome;
		$cliente->cognome = $request->cognome;
		$cliente->data_nascita = $request->data_nascita;
		$cliente->codice_fiscale = $request->codice_fiscale;
		$cliente->save();
		
		return $cliente;
	}
}
