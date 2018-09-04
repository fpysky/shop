<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PermissionResource extends Resource
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
            'route' => $this->route,
            'icon' => $this->icon,
            'pid' => $this->pid,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
