<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{

    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id', 'musica_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function musica(){
        return $this->belongsTo('App\Musica');
    }
}
