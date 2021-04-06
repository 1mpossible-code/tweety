<?php


namespace App\Services;


use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProfileService
 * @package App\Services
 */
class ProfileService
{

    /**
     * Save data from user profile request to the database
     * if user specified new avatar - update it too
     * @param User $user
     * @param UpdateProfileRequest $request
     * @return bool
     */
    public function update(User $user, UpdateProfileRequest $request)
    {

        $attributes = $request->validated();

        $avatar = $request->file('avatar');

        if ($avatar) {
            $attributes['avatar'] = $this->changeAvatar($user, $avatar);
        }

        return $user->update($attributes);

    }

    /**
     * Remove old avatar of the user if user has it
     * save new one to storage/avatars folder and return its basename
     * @param User $user
     * @param UploadedFile $avatar
     * @return string
     */
    public function changeAvatar(User $user, UploadedFile $avatar)
    {

        $oldAvatarFilename = basename($user->avatar);
        if ($oldAvatarFilename !== 'default-user-avatar.png') {
            Storage::delete('avatars/'.$oldAvatarFilename);
        }

        $pathToAvatar = Storage::put('avatars', $avatar);
        return basename($pathToAvatar);

    }

}
