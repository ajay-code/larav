<?php
namespace App\Http\Controllers\User;

use Auth;
use Cookie;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileUpdateRequest;

class UserProfileController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateAvatar(Request $request)
    {
        // Extracting The Image
        list($ext, $data)   = explode(';', $request->avatar);
        list(, $data)       = explode(',', $data);
        $avatar =  base64_decode($data);

        // Generating Name For File
        $avatarName = Auth::id() . str_random(10) . time() . '.png';
        $path = 'avatar/'.$avatarName;

        // Storing The File
        file_put_contents(storagePath($path), $avatar);

        // Updating User Avatar
        $user = Auth::user();
        $user->profile_picture = $path;
        $user->save();

        // Return Url To the Avatar
        return getStorageUrl($path);
    }

}
