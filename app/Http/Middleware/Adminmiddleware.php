<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RevalidateBackhistory;

class Adminmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->usertype=='admin')
        {
            if($request->ajax()|| $request->wantsJson()){
                return response('Unauthorized.',401);
            }else{
                return $next($request);
            }
        }
        $response = $next($request);
        return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
            ->header('Pragma','no-cache')
            ->header('Expires','Fri, 01 Jan 1990 00:00:00 GMT');

        // if(Auth::user()->usertype=='admin')
        // {
        //     return $next($request);
        // }
        // else
        // {
        //     return redirect('/')->with('status','something is wrong with you');
        //     //this status will come when you are not admin but you try to be admin.
        // }
        
    }
}
    
   
