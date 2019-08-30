<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        try 
        {
            $this->validate($request,[
                'full_name'     => 'required', 
                'username'      => 'required|min:6', 
                'email'         => 'required|email',
                'password'      => 'required|min:6',
            ]);
            
        } 
        catch (ValidationException $e) 
        {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }

        echo "Validation success";

    }


    //
}
