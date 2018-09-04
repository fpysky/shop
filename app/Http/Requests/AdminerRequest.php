<?php

namespace App\Http\Requests;

class AdminerRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required|unique:adminers,name,'.$this->get('id'),
            'account' => 'required|unique:adminers,account,'.$this->get('id'),
            'roles' => 'required'
        ];
    }
}
