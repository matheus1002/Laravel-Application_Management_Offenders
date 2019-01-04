<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $guarded = ['id','infrator_id'];
	protected $fillable = [
		'cep',
		'rua',
		'numero',
		'complemento',
		'bairro',
		'cidade',
		'estado',
	];

    public function Infratores()
	{
		return $this->BelongsTo("App\Infratores");
	} 
}
