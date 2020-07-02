<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'year', 'date', 'course', 'place',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
