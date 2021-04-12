<?php


namespace App\Services;


use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class PasswordService
{
    public function update(User $user, UpdatePasswordRequest $request)
    {

        $attributes = $request->validated();

        if (Hash::check($attributes['password'], $user->password)) {
            $newPassword = $attributes['new_password'];
            $user->update(['password' => $newPassword]);
            return true;
        }

        return false;
    }

}
