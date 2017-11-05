<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function profileEdit(Request $request)
    {
        $done = $request->post('done', 0);

        return view('auth.profile', compact('done'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(Request $request)
    {
        $a = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'string|max:255',
            'country' => 'required|string|min:2',
            'phone' => 'required|string|min:6',
        ]);


        auth()->user()->update($a);

        return redirect()->route('user.profile', ['done'=>1]);
    }

}
