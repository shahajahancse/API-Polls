<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

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
        
    }

    // Create to user registration function here ->
    
    public function create(Request $request)  
    {
        try     //  Data Validation here ->
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
                //  Validation end
                //  
        try     // Data insert here ->
        {
            $id = DB::table('users')->insertGetId([
                'full_name'  => trim($request->input('full_name')),
                'username'   => strtolower(trim($request->input('username'))), 
                'email'      => strtolower(trim($request->input('email'))),
                'password'   => app('hash')->make($request->input('password')),
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now(),
            ]);

            // Data insert end 
            // 
            // retrieve a single row by the id, use the find method() here ->

            $user = DB::table('users')->find($id);
            return response()->json([
                'id'        => $user->id,
                'full_name' => $user->full_name,
                'username'  => $user->username, 
                'email'     => $user->email,
            ]);
        } 
        catch (Exception $e) 
        {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }   
            // end insert and Retrieving A Single Row data
    }


    // Retrieving All Data From A Table
    
    public function view()
    {
        $user = DB::table('users')->get();
        return response()->json($user);
    }


    //
}
