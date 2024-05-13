<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        if($request->user()->is_admin) {
            return to_route('dashboard');
        }else {
            return to_route('home');
        }
    }
}
