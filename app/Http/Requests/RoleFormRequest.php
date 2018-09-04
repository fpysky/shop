<?php

namespace App\Http\Requests;

class RoleFormRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required|max:10|unique:roles,name,'.$this->get('id'),
            'permissions' => 'required'
        ];
    }
}
