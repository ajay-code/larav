<?php

namespace App\Http\Controllers\User;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Update the password for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {

    	$this->validate($request,[
    		'old_password' => 'required|old_password:'.Auth::user()->password,
    		'password' => 'required|min:6|different:old_password|confirmed',
    	]);
    	
        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();

        alert()->success('You have successfully changed your password');

        return redirect(url('/profile'));
    
    }

    /**
     * Update the password for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function change()
    {
        // Validate the new password length...
    	$user = Auth::user();
        return view('user.changepassword', compact('user'));
    }
}
