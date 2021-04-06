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

        $avatar = $request->file('avatar');

        if ($avatar) {
            $pathToAvatar = Storage::put('avatars', $avatar);
            $attributes['avatar'] = basename($pathToAvatar);
        }

        return $user->update($attributes);

    }

}
