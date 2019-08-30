<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    return response()->json([
            'success' => true, 
            'message' => 'Welcome to our Poll API'
        ]);

    //
}
