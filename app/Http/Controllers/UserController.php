<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\MainLink;
use Auth;

class UserController extends Controller
{

    public function edit()
    {
        return view('users.edit',[
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'background_color' => 'required|size:7|starts_with:#',
            'text_color' => 'required|size:7|starts_with:#',
            'cards_border_color' => 'required|size:7|starts_with:#',
            'cards_type' => 'required',
            'bg_img'=> 'required'
        ]);

        Auth::user()->update($request->only(['background_color','text_color','cards_border_color', 'cards_type', 'bg_img']));

        return redirect()->back()
            ->with(['success' => 'Changes saved successfully!']);
    }

    public function show(User $user, MainLink $mainlink)
    {
        Auth::user()->mainlinks()->increment('views');

        return view('users.show', [
            'user' => $user
        ]);
    }

}
