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
        ]);
        
        try {

            $registration = new User();
            $registration->email = $request->email;
            $registration->password = Hash::make($request->password);
            $registration->name = $request->name;
            $registration->save();

            return redirect()->back()->with('success', 'Registration successful');

        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Something happened please try again later');
        }
    }

    
}
