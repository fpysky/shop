<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserAddressResource extends Resource
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
            'user_id' => $this->user_id,
            'province' => $this->province,
            'city' => $this->city,
            'district' => $this->district,
            'address' => $this->address,
            'zip' => $this->zip,
            'contact_name' => $this->contact_name,
            'contact_phone' => $this->contact_phone,
            'created_at' => empty($this->created_at)?'':date('Y-m-d H-i',$this->created_at),
            'updated_at' => empty($this->updated_at)?'':date('Y-m-d H-i',$this->updated_at),
        ];
    }
}
