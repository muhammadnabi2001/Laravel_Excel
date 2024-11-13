<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CodeVerify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CodeVerifyController extends Controller
{
    public function userverify()
    {
        return view('User.userverify');
    }
    public function check(Request $request)
    {
        //dd(Auth::user()->id);
        $request->validate([
            'code' => 'required|digits:4',
        ]);
        $userId = Auth::id();
        $codeVerify = CodeVerify::where('user_id', $userId)
            ->where('code', $request->code)
            ->first();
        if ($codeVerify) {
            $user = User::find($userId);
            $user->email_verified_at = now(); 
            $user->save();
            return view('dashboard')->with('success', 'Your verification code is correct!');
        } else {
            return redirect('dashboard')->with('error', 'Invalid verification code!');
        }
    }
}
