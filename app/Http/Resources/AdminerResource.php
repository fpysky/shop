<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AdminerResource extends Resource
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
            'id' => $this->id,
            'name' => $this->name,
            'account' => $this->account,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'introduction' => $this->introduction,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
