<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Visit;

class VisitController extends Controller
{

    public function store(Link $link, Request $request)
    {
        return $link -> visits()
            ->create([
                'user_agent' => $request -> userAgent()
            ]);
    }

}
