<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\User\UserListResource;
use App\Http\Resources\User\UserDetailResource;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'birth_date',
    ];

    public function records()
    {
        return $this->hasMany('App\Models\Record');
    }

    public static function getList()
    {
        $users = static::with('records')->get();

        return UserListResource::collection($users);
    }

    public static function getUser($id)
    {
        $user = static::with('records')->findOrFail($id);
        
        return new UserDetailResource($user);
    }
}
