<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if ($request->expectsJson()) {
            $success['status'] = 'error';
            $success['message'] = trans("api.not_authorized");
            $success['delivery_charge'] =0;

            return response()->json($success, 200);
        } else {
            return ;
        }
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 402);
        }

        return redirect()->guest(route('login'));
    }
}
