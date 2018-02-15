<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Musica extends Model
{
    
	use Notifiable;

    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'autor'
    ];

    /**
    * Relationships
    */
    public function file()
    {
        return $this->hasOne('App\File');
    }

    public function voto(){
        return $this->hasMany('App\Voto');
    }
}
