<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UserDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $date = Carbon::create($this->birth_date);
 
        return [
            'id'     => $this->id,
            'name'   => $this->name,
            'age'    => $date->age,
            'course' => $date->course,
            'records'  => $this->records
        ];
    }
}
