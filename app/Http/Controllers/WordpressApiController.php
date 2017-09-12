<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordpressApiController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function status()
    {
        return view('wordpress-api-status');
    }
}
