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

class TwitterController extends LoginController
{
    use AuthenticatesUsers;

    /**
     * Redirect the user to the Twitter authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from Twitter.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('twitter')->user();

        /** @var User $callUser */
        $callUser = User::updateOrCreate(['email' => $user->getEmail()],[
            'first_name' => $user->getName(),
            'provider' => User::PROVIDER_TWITTER,
            'updated_at' => time(),
        ]);

        Auth::login($callUser);

        return redirect($this->redirectTo);
    }
}