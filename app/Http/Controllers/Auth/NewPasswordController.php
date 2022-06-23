<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\SecPass;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class NewPasswordController extends Controller
{
    protected $userModel;
    protected $secPassModel;
    /**
     * Display the password reset view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */

    public function __construct(){
        $this->userModel = new User;
        $this->secPassModel = new SecPass;
    }

    
    public function create(Request $request)
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        Log::info("Request password reset : "  .  json_encode($request->all()));
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'sec_pass' => ['required'],
            'new_password' => ['required'],
            'password_confirmation' => ['required', 'same:new_password']
        ]);

        //validate secret password
        $result = $this->secPassModel->validateSecretPass($validated['sec_pass'], $validated['email']);

        if(!empty($result->userID)){
            return response()->json(array('status'=> true));
        }

        return response()->json(array('status'=> false));
        
        // $request->validate([
        //     'token' => ['required'],
        //     'email' => ['required', 'email'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        // // Here we will attempt to reset the user's password. If it is successful we
        // // will update the password on an actual user model and persist it to the
        // // database. Otherwise we will parse the error and return the response.
        // $status = Password::reset(
        //     $request->only('email', 'password', 'password_confirmation', 'token'),
        //     function ($user) use ($request) {
        //         $user->forceFill([
        //             'password' => Hash::make($request->password),
        //             'remember_token' => Str::random(60),
        //         ])->save();

        //         event(new PasswordReset($user));
        //     }
        // );

        // // If the password was successfully reset, we will redirect the user back to
        // // the application's home authenticated view. If there is an error we can
        // // redirect them back to where they came from with their error message.
        // return $status == Password::PASSWORD_RESET
        //             ? redirect()->route('login')->with('status', __($status))
        //             : back()->withInput($request->only('email'))
        //                     ->withErrors(['email' => __($status)]);
    }
}
