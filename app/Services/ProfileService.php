<?php


namespace App\Services;


use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProfileService
 * @package App\Services
 */
class ProfileService
{

    /**
     * Save data from user profile request to the database with basename of avatar and hashed password
     * @param User $user
     * @param UpdateProfileRequest $request
     * @return bool
     */
    public function update(User $user, UpdateProfileRequest $request)
    {

        $attributes = $request->validated();

        $path = Storage::put('avatars', $request->file('avatar'));

        $attributes['avatar'] = basename($path);
        $attributes['password'] = Hash::make($attributes['password']);

        return $user->update($attributes);

    }

}
