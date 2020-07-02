<?php

namespace App\Http\Resources\Record;

use Illuminate\Http\Resources\Json\JsonResource;

class RecordListResource extends JsonResource
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
        return [
            'date'       => $this->date,
            'user_id'    => $this->user_id,  
            'name'       => $this->user->name,
            'course'     => $this->course,
            'place'      => $this->place
        ];
    }
}
