<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function status(Request $request)
    {
        return response()->json([
            'status' => 'ok'
        ], 200);
    }
}
