<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Application\app;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AccessAuthentication;

class Authentication extends Controller
{
    public function getRegistration(){
        
      if( View::exists( 'access/userRegistration' ) ) {
          
        return view( 'access/userRegistration' );
      } 
    }
    
    public function postRegistration( AccessAuthentication $request ) {
        
      if ( $request->isMethod( 'post' ) ) {
         
        $password = Hash::make( $request->input( 'password' ) );  
        
        $user_model = new UsersModel();
        $user_model -> name = $request -> input( 'name' );
        $user_model -> password = $password ;
        $user_model -> email = $request -> input( 'email' );
          
        $user_model -> save();
          
        $response = "success";
          
        return response() -> json( $response );
      }
    }
    
    public function login( Request $request ) {
        
      if ( $request->isMethod( 'post' ) ) {
        
        if (Auth::attempt( [ 'name' => $request->input( 'username' ), 'password' => $request->input( 'password' ) ] ) ) {
          die('Access Granted');  
        }
        die('Access Denied');
      }
      
      else if ( $request->isMethod( 'get' ) ) {
         
        if ( View::exists( 'access/login' ) ) {
         
          return view( 'access/login' );
        }
      }
    }
    
 

    public function username( Request $request ) {

      if( $request->isMethod( 'post' ) ) {

        $data[ 'name' ] = $request->input( 'username' );
        $data[ 'getUser' ] = UsersModel::where( 'name' , $data[ 'name' ] )->count();
        
        return response() -> json( [$data][0] );

      }
        
    }
}
