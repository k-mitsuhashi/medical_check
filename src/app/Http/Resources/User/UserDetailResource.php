<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Http\Resources\User\RecordResource;

class UserDetailResource extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = '';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $date = Carbon::create($this->birth_date);
        $records = RecordResource::collection($this->records)->toArray($request);
 
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'birth_date' => $this->birth_date,
            'age'        => $date->age,
            'course'     => config('const.course')[$date->course],
            'records'    => $records,
        ];
    }
}
