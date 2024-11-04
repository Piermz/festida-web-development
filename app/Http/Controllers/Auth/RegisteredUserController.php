<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'account_type' => ['required', 'string', 'max:255'],
                'occupation' => ['required'],
                'experience' => ['required', 'numeric', 'min:0'],
                'avatar' => ['required', 'image', 'mimes:png,jpg,jpeg'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
    
            if($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
            }
            $user = User::create([
                'name' => $request->name,
                'occupation' => $request->occupation,
                'experience' => $request->experience,
                'avatar' => $avatarPath,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            if ($request->account_type == 'Employee') {
                $user->assignRole('employee');
            } else if($request->account_type == 'Employer') {
                $user->assignRole('employer');
            } else {
                $user->assignRole('employee');
            }
            event(new Registered($user));
    
            Auth::login($user);
    
            return redirect(route('dashboard', absolute: false));
        } catch (\Throwable $th) {
            dd( $th->getMessage());
        }
        
    }
}
