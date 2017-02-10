<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\ActivationToken;
use App\Mail\UserConfirmationEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ActivationController extends Controller
{
    /**
     * Handle the Confirmation of user Email
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function confirmEmail(ActivationToken $token)
    {
//        return $token;

        $token->user()->update([
            'verified' => true
        ]);

        $token->delete();

        Auth::login($token->user);

        alert()->success('you are now LoggedIn', 'Account Conformed');

        return redirect()->route('home');

    }

    public function show()
    {
        return view('resendemail');
    }

    public function resend(Request $request)
    {

        $this->validate($request,[
           'email' => 'exists:users,email'
        ]);

        $user = User::where('email', $request->input('email'))->firstOrFail();
        if($user->verified){
            alert()->info('The user is already verified. Please directly login ' );
            return redirect('/login');
        }
        $user->with('activationToken')->get();

        $token = $user->activationToken;

        $email = new UserConfirmationEmail($user, $token);
        Mail::to($request->input('email'))->send($email);

        alert()->success('Confirmation Email has Resend sent to you');

        return back();
    }
}
