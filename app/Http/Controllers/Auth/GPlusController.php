<?php
/**
 * Created by PhpStorm.
 * User: Abdelqader Osama
 * Date: 31/10/17
 * Time: 12:56
 */

namespace App\Http\Controllers\Auth;

//use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Socialite;

class GPlusController extends LoginController
{
    use AuthenticatesUsers;

    /**
     * Redirect the user to the google authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();

        /** @var User $calledUser */
        $calledUser = User::updateOrCreate(['email' => $user->getEmail()],[
            'first_name' => $user->getName(),
            'provider' => User::PROVIDER_GPLUS,
            'updated_at' => time(),
        ]);

        Auth::login($calledUser);

        return redirect($this->redirectTo);
    }
}