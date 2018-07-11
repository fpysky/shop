<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class InvalidValidateException extends Exception
{
    public $status = 422;

    /**
     * 验证异常类
     * InvalidValidateException constructor.
     * @param string $validator
     */
    public function __construct($validator)
    {
        parent::__construct('验证不通过');
        $this->validator = $validator;
    }

    public function render(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json(['code' => 422,'errors' => $this->validator->errors()],$this->status);
        }else{
            return view('error.error', ['message' => $this->validator->errors()->first()]);
        }
    }
}
