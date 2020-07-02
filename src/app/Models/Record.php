<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Record\RecordListResource;

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

    public static function getList($year)
    {
        $records = static::with('user')
            ->where('year', $year)
            ->get();

        return RecordListResource::collection($records);
    }

    public static function years()
    {
        return static::distinct()->select('year')->pluck('year');
    }
}
