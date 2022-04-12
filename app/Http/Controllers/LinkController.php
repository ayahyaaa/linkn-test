<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Models\Mainlink;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LinkController extends Controller
{

    public function index()
    {
        $links = Auth::user()->links()
            ->withCount('visits')
            ->with('latest_visit')
            ->get();

        $mainlinks = Auth::user()->mainlinks()
            ->withCount('mainlinkvisits')
            ->with('latest_mainlinkvisit')
            ->get();

        $user = Auth::user();

        $sums = 0;
        $ave = 0;

        foreach ($links as $link) {
            $sums = $sums + $link->visits_count;
        }

        foreach ($mainlinks as $mainlink) {
            $ave = $sums / $mainlink->views;
        }
        
        return view('links.index', ['links' => $links, 'mainlinks' => $mainlinks, 'user' => $user, 'sums' => $sums, 'average' => $ave]);
    }

    public function create()
    {
        return view('links.create', ['user' => Auth::user()]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|max:255',
            'link' => 'required'
        ]);

        $link = Auth::user()->links()->create($request->only(['name','link']));

        if($link){
            return redirect()->to('/dashboard/links');
        }

        return redirect()->back();
    }

    public function edit(Link $link)
    {
        if ($link->user_id != Auth::id()) {
            return abort(404);
        }

        return view('links.edit', [
            'link' => $link,
            'user' => Auth::user()
        ]);
    }

    public function update(Link $link, Request $request)
    {
        if ($link->user_id != Auth::id()) {
            return abort(403);
        }

        $request->validate([
            'name' => 'required|max:255',
            'link' => 'required|'
        ]);

        $link -> update($request->only(['name','link']));

        return redirect()->to('/dashboard/links');
    }

    public function destroy(Link $link, Request $request)
    {
        if ($link->user_id != Auth::id()) {
            return abort(403);
        }

        $link->delete();

        return redirect()->to('/dashboard/links');
    }

}
