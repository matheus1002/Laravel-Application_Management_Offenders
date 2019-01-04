<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function eAdmin()
    {
        return $this->existePapel('Admin');
    }

    public function papeis()
    {
        return $this->belongsToMany(Papel::class);
    }

    public function adicionaPapel($papel)
    {
        if (is_string($papel))
        {
            $papel = Papel::where('nome','=',$papel)->firstOrFail();
        }

        if ($this->existePapel($papel))
        {
            return;
        }
        return $this->papeis()->attach($papel);
    }

    public function existePapel($papel)
    {
        if (is_string($papel))
        {
            $papel = Papel::where('nome','=',$papel)->firstOrFail();
        }
        return (boolean) $this->papeis()->find($papel->id);
    }

    public function removePapel($papel)
    {
        if (is_string($papel))
        {
            $papel = Papel::where('nome','=',$papel)->firstOrFail();
        }
        return $this->papeis()->detach($papel);
    }

    public function temUmPapelDestes($papeis)
    {
        $userPapeis = $this->papeis;
        return $papeis->intersect($userPapeis)->count();
    }

    public function acessos()
    {
        return $this->hasMany(Acesso::class);
    }

    public function registrarAcessoOn()
    {
        return $this->acessos()->create([
            'user_id'   => $this->id,
            'status' => 'Entrada',
            'so' => php_uname(),
            'host' => gethostname(),
            'ip' => $_SERVER['REMOTE_ADDR'],
            'created_at'  => date('YmdHis'),
        ]);  
    }

    public function registrarAcessoOff()
    {
        return $this->acessos()->create([
            'user_id'   => $this->id,
            'status' => 'Saída',
            'so' => php_uname(),
            'host' => gethostname(),
            'ip' => $_SERVER['REMOTE_ADDR'],
            'created_at'  => date('YmdHis'),
        ]);  
    }

}
