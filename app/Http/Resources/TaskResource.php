<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use auth;
class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

         return [
        'id' => $this->id,
        'name' => $this->name,
        'period' => $this->period,
        'description' => $this->description,
        'task_end_time' => $this->task_end_time,
        'user_id' => auth::user()->id,
    //$tasks->addMedia($request->avatar)->toMediaCollection('avatar');
    ];
    }
}
