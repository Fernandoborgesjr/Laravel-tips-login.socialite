<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider(Request $request)
    {
        $provider = str_replace('login/','', $request->path());
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)
    {
        $provider = str_replace('/callback','', str_replace('login/','', $request->path()));
        $user = Socialite::driver($provider)->user();
        echo "<h1>Seja bem vindo {$user->getName()}</h1>";
        echo "<img src='{$user->getAvatar()}'>";
    }

}
