<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
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


    public function index()
    {
        return response()->json([
                'success' => true, 
                'message' => 'Welcome to our Poll API'
            ]);
    }


    public function create(Request $request)
    {
        return $request->all();
    }




    //
}
