<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\User\AccountAddressRequest;
use App\Http\Requests\Account\User\PasswordUpdateRequest;
use App\Http\Requests\Account\User\AccountRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        return view('account.profile.edit', compact('user'));
    }

    public function editAddresses(Request $request): View
    {
        $user = $request->user();

        return view('account.addresses.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(AccountRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $request->user()->save();

        $request->user()->account()->update([
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
        ]);

        return Redirect::route('account.profile.edit')->with('status', 'Saved successfully!');
    }

    public function saveAddress(AccountAddressRequest $request): RedirectResponse
    {
        $request->user()->account()->addresses->updateOrCreate($request->validated());

        return Redirect::route('account.addresses.edit')->with('status', 'Saved successfully!');
    }

    /**
     * Update the user's password.
     */
    public function changePassword(PasswordUpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $request->user()->update([
            'password' => Hash::make($data['new_password']),
        ]);

        return Redirect::route('account.profile.edit')->with('status', 'Saved successfully!');
    }
}
