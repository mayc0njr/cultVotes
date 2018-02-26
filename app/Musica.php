<?php

namespace CultVotes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Musica extends Model
{
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
        return $this->hasOne('CultVotes\File');
    }

    public function user(){
        return $this->hasMany('CultVotes\User');
    }
}
