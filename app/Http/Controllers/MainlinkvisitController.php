<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainLink;
use App\Models\mainlinkvisit;

class MainlinkvisitController extends Controller
{

    public function store(MainLink $mainlink, Request $request)
    {
        return $mainlink -> mainlinkvisits()
            ->create([
                'user_agent' => $request -> userAgent()
            ]);
    }

}
