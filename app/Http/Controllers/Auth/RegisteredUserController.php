<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\User\UserRequest;
use App\Models\Account;
use App\Models\Referral;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create($referral=null): View
    {
        return view('auth.register', compact('referral'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $user = User::query()->create([
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ])->assignRole('account');

        $account = Account::query()->create([
            'user_id' => $user->id,
            'name' => $request->name,
            'referral_code' => Str::orderedUuid()
        ]);

        if ($request->referral && $rAccount = Account::query()->where('referral_code', $request->referral)->first()) {
            Referral::query()->create([
                'type' => 'account',
                'account_id' => $account->id,
                'invited_by_account_id' => $rAccount->id,
            ]);
            $rAccount->update(['referral' => $rAccount->referral + 10]);
        }

        if ($request->email) {
            $user->sendEmailVerificationNotification();
        } else {
//            TODO need to verify phone number via sms
            $user->update(['email_verified_at' => now()]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
