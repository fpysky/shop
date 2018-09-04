<?php

namespace App\Http\Requests;

class PermissionFormRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required|unique:permissions,name,'.$this->get('id'),
            'route' => 'required|unique:permissions,route,'.$this->get('id'),
        ];
    }
}
