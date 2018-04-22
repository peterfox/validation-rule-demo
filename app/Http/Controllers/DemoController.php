<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DemoController extends Controller
{
    public function demo(Request $request)
    {
        $this->validate($request, [
            'field' => ['int', Rule::even()],
        ]);

        return view('welcome');
    }
}
