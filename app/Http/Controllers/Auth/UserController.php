<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ProfileRequest;
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
    public function profileUpdate(ProfileRequest $request)
    {


        auth()->user()->update($request->all());

        return redirect()->route('user.profile', ['done'=>1]);
    }

}
