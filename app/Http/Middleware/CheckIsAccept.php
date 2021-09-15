<?php

namespace App\Http\Middleware;
use App\Http\Controllers\APIResponseTrait;
use Closure,Auth;

class CheckIsAccept
{
    use APIResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'api')
    {
        $status = Auth::guard($guard)->user()->status ; 

        if ($status == "accept"  ) {
            return $next($request);
            }
            elseif($status == "pending" )
            {
                return $this->APIResponse(null, " This account has not been approved from admin", 401);
            }
            elseif($status == "blocked"){
                return $this->APIResponse(null, "this accout not accept from admin because :" 
                . Auth::guard($guard)->user()->block_reason, 401);
            }
        // return $next($request);
    }
}
