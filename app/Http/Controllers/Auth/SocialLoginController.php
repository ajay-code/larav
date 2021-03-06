<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Socialite;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['social', 'guest']);
    }

    public function redirect($service, Request $request)
    {
        return Socialite::driver($service)->redirect();
    }

    public function callback($service, Request $request)
    {
        $serviceUser = Socialite::driver($service)->user();
//        return $serviceUser->getAvatar();
        $user = $this->getExistingUser($serviceUser, $service);

        if (!$user) {
            $user = User::create([
                "name" => $serviceUser->getName(),
                "email" => $serviceUser->getEmail(),
                "verified" => true,
            ]);

            $user->fill([
                "profile_picture" => $serviceUser->getAvatar()
            ]);

            $user->save();

        }

        if ($this->needsToCreateSocial($user, $service)) {

            $this->uploadProfilePictureIfDoesNotExists($user, $serviceUser);

            $user->social()->create([
                'social_id' => $serviceUser->getId(),
                'service' => $service,
            ]);
        }

        Auth::login($user, false);

        if(!Auth::user()->isActive){
            Auth::logout();
            alert()->info('your account is dectivated, Please contact info@example.com')->persistent('Close');
            return redirect()->home();
        }

        return redirect()->intended();
    }

    protected function needsToCreateSocial(User $user, $service)
    {
        return !$user->hasSocialLinked($service);
    }

    protected function getExistingUser($serviceUser, $service)
    {
        return User::where('email', $serviceUser->getEmail())->orWhereHas('social', function ($q) use ($serviceUser, $service) {
            $q->where('social_id', $serviceUser->getId())->where('service', $service);
        })->first();
    }

    public function uploadProfilePictureIfDoesNotExists($user, $serviceUser)
    {
        if (!$user->profile_picture) {
            $user->fill([
                "profile_picture" => $serviceUser->getAvatar()
            ]);
            $user->save();
        }
    }
}
