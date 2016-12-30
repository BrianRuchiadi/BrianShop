<?php

namespace App\Http\Controllers;

use App\Models\AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Application\app;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AccessAuthentication;

class Authentication extends Controller
{
    public function getRegistration(){
      if( View::exists( 'userRegistration' ) ) {
        return view( 'userRegistration' );
      } 
    }
    
    public function postRegistration( AccessAuthentication $request ){
      if ( $request->isMethod( 'post' ) ) {
        $appUserModel = new AppUser();
        $appUserModel -> username = $request -> input( 'username' );
        $appUserModel -> password = $request -> input( 'password' );
        $appUserModel -> email = $request -> input( 'email' );
        $appUserModel -> active = 1;
          
        $appUserModel -> save();
          
        $response = "success";
          
        return response() -> json( $response );
      }
    }
    
 

    public function username( Request $request ) {

      if( $request->isMethod( 'post' ) ) {
        $data[ 'username' ] = $request->input( 'username' );
        $data[ 'getUser' ] = AppUser::where( 'username' , $data[ 'username' ] ) -> first();
            
        return response() -> json( [$data][0] );
      }
        
    }
}
