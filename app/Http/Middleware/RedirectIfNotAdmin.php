<?php

namespace App\Http\Middleware;

class RedirectIfNotAdmin
{
    
    
  public function handle( $request, Closure $next, $guard = 'admins' ) 
  {
    if ( !Auth::guard( $guard)->check() ) {
      return redirect('/');
    }
    
    return $next( $request );
  }
}