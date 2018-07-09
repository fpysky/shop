<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function root(){
        return view('pages.root');
    }

    public function emailVerifyNotice(Request $request)
    {
        return view('pages.email_verify_notice');
    }

    public function test(){
        $this->dispatch(new \App\Jobs\Test(10));
        return ['aaa' => 'aaa'];
    }
}
