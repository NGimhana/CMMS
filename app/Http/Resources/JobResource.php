<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'type'=>$this->type,
            'asset_id'=>$this->asset_id,
            'description'=>$this->description,
            'priority'=>$this->priority,
            'Started_Date'=>$this->Started_Date,
            'Scheduled_End_Date'=>$this->Scheduled_End_Date,
            'Ended_Date'=>$this->Ended_Date,
            'created_user_id'=>$this->created_user_id,
            'Assigned_Person_id'=>$this->Assigned_Person_id,
        ];
    }
}
