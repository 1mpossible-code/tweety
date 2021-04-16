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
        $banner = $request->file('banner');

        if ($avatar) {
            $attributes['avatar'] = $this->changeAvatar($user, $avatar);
        }

        if ($banner) {
            $attributes['banner'] = $this->changeBanner($user, $banner);
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
        return $this->changeFile($oldAvatarFilename, $avatar, 'default-user-avatar.png', 'avatars');
    }

    /**
     * Returns paginated tweets of the specified user
     * @param User $user
     * @param $amount
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginatedTweets(User $user, $amount)
    {
        return $user->tweets()->withLikes()->paginate($amount);
    }

    /**
     * Remove old banner of the user if user has it
     * save new one to storage/banners folder and return its basename
     * @param User $user
     * @param UploadedFile $banner
     * @return string
     */
    public function changeBanner(User $user, UploadedFile $banner)
    {
        $oldBannerFilename = basename($user->banner);
        return $this->changeFile($oldBannerFilename, $banner, 'default-profile-banner.jpg', 'banners');
    }

    /**
     * Save the new file to folder, delete if not a default name
     * return the basename of saved file
     * @param string $oldFilename
     * @param UploadedFile $newFile
     * @param string $defaultFilename
     * @param string $directory
     * @return string
     */
    public function changeFile(string $oldFilename, UploadedFile $newFile, string $defaultFilename, string $directory)
    {
        if ($oldFilename !== $defaultFilename) {
            Storage::delete($directory.'/'.$oldFilename);
        }

        $imageService = new ImageService();
        return $imageService->saveImage($newFile, $directory);
    }

}
