<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracfisica extends Model
{
    protected $guarded = ['id','infrator_id'];
	protected $fillable = [
		'etnia',
		'olho',
		'barba',
		'dente',
		'orelha',
		'boca',
		'nariz',
		'sobrancelha',
		'altura',
		'corDoCabelo',
		'tipoDeCabelo',
		'cicMarcTatu',
	];

    public function Infratores()
	{
		return $this->BelongsTo("App\Infratores");
	} 
}
