<?php

namespace App;

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
        return $this->belongsTo('App\Musica');
    }

    public function user()
    {
        return $this->belongsTo('App\Admin', 'admin_id');
    }
}
