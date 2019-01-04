<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infprocessual extends Model
{
    protected $table = 'infprocessuais';
    protected $guarded = ['id','infrator_id'];
	protected $fillable = [
		'situacao',
		'classeDeliquente',
		'unidadeDeOrigem',
		'dataDeRecolhimento',
		'observacao',
		'historico',
	];

    public function Infratores()
	{
		return $this->BelongsTo("App\Infratores");
	} 
}
