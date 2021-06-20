<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class GoogleServiceController extends Controller
{
    public function driveAssets(Request $request)
    {
        if (auth()->user()->social_id) {
            $dir = $request->has('path') ? $request->path : '/';
            $recursive = true;
            $contents = collect(Storage::disk('google')->listContents($dir, $recursive));
            $files = $contents->where('type', '=', 'file');
            $dirs = $contents->where('type', '=', 'dir');
            return view('dashboard.drivefile', compact('files', 'dirs'));
        } else {
            return redirect()->route('google.auth');
        }
    }

    

    public function redirectToAuth()
    {
        $parameters = ['access_type' => 'offline'];
        return Socialite::driver('google')->scopes(["https://www.googleapis.com/auth/drive"])->with($parameters)->redirect();
    }

    public function handleCallback(Request $request)
    {
        $providerData = Socialite::driver('google')->user();
        // dd($providerData);
        $existingUser = User::where('email', $providerData->email)->first();
        
        if ($existingUser) {
            $existingUser->social_token = $providerData->token;
            $existingUser->refresh_token = $providerData->refreshToken;
            
            $existingUser->save();
            if ($existingUser->social_id) {
                auth()->attempt(['email' => $existingUser->email, 'password' => $existingUser->social_id]);
            } else {
                if ($existingUser == auth()->user()) {
                    $existingUser->social_id = $providerData->id;
                    $existingUser->save();
                    return redirect()->route('drive.contents');
                }
            }
          
            return redirect()->route('dashboard');
        } else {
            $user = new User;
            $user->name = $providerData->name;
            $user->email = $providerData->email;
            $user->email_verified_at = now();
            $user->social_token = $providerData->token;
            $user->refresh_token = $providerData->refreshToken;
            $user->social_id = $providerData->id;
            $password = $providerData->id;
            $user->password = bcrypt($password);
            $user->save();

            auth()->attempt(['email' => $providerData->email, 'password' => $password]);
            return redirect()->route('dashboard');
        }
    }
}
