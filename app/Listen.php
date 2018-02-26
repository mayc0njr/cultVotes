<?php

namespace CultVotes;
use Illuminate\Database\Eloquent\Model;

class Listen extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'musica_id', 'user_id'
    ];
}
