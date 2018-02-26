<?php

namespace CultVotes;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
    * Relationships
    */
    public function musica()
    {
        return $this->belongsTo('CultVotes\Musica');
    }
}
