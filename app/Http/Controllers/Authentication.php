<?php

namespace App\Http\Controllers;

use App\AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Application\app;
use Illuminate\Http\RedirectResponse;

class Authentication extends Controller
{
    public function Registration(Request $request){
        $method = $request->method();
        
        if($request->isMethod('post')){
            
            $data['username'] = $request->input('username');
            $data['password'] = $request->input('password');
            $data['email'] = $request->input('email');
            
            $salt = rand(11111111, 99999999);
            
            $insert =  new AppUser();
            $insert->username = $data['username'];
            $insert->active = 1;
            $insert->email = $data['email'];
            $insert->password = $data['password'];
            
            $insert->save();
            
            return response()->json([$data][0]);
            //return redirect('/');
        }
        if($request->isMethod('get')){
       
            if(View::exists('userRegistration')){
                return view('userRegistration');
            } 
        }
    }
    
    public function Username(Request $request){
        $method = $request->method();
        
        if($request->isMethod('post')){
            
            $data['username'] = $request->input('username');
            $data['getUser'] = AppUser::where('username', $data['username'])->first();
            
            return response()->json([$data][0]);
        }
        
    }
}
