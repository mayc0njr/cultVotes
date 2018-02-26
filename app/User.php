<?php

namespace CultVotes;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use CultVotes\Notifications\emaildeRecuperacaodeSenha;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpf', 'email', 'password', 'voto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function musica(){
        return $this->belongsTo('CultVotes\Musica');
    }

    public function sendPasswordResetNotification($token){
        $this->notify(new emaildeRecuperacaodeSenha($token));
    }
}
