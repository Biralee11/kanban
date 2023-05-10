<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view('auths.auth-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
            // 'role_id' => 'required'
        ]);
        // dd($request->input());

        try {
            $registration = new User();
            $registration->email = $request->email;
            $registration->password = Hash::make($request->password);
            $registration->name = $request->name;
            $registration->save();

            return view('auths.auth-login')->with('success', 'Registration successful you can login now');

        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Something happened please try again later');
        }
    }
}
