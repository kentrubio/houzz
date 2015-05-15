<?php namespace App\Http\Middleware;

use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Closure;

class Authenticate {

    /**
     * The Sentry implementation.
     *
     * @var Sentry
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Sentry $auth
     */
    public function __construct(Sentry $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $auth = $this->auth;

        if ( ! $auth::check())
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->guest('signin');
            }
        }

        return $next($request);
    }

}
