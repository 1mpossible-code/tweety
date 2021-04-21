<?php


namespace App\Services;


use App\Http\Requests\StoreTweetRequest;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Class TweetService
 * @package App\Services
 */
class TweetService
{
    /**
     * Creates the new Tweet
     * @param User $user
     * @param StoreTweetRequest $request
     * @return mixed
     */
    public function create(User $user, StoreTweetRequest $request)
    {
        $body = $request->validated()['body'];

        $image = $request->file('image');

        if ($image) {
            $imageFilename = $this->storeImageFile($image);
        } else {
            $imageFilename = null;
        }

        return Tweet::create([
            'user_id' => $user->id,
            'body' => $body,
            'image' => $imageFilename,
        ]);
    }

    /**
     * Store image file in storage/images directory,
     * return its basename
     * @param UploadedFile $image
     * @return string
     */
    public function storeImageFile(UploadedFile $image)
    {
        $imageService = new ImageService;
        return $imageService->saveImage($image, 'images');
    }

    /**
     * Delete the tweet and the image in
     * storage/images directory if exists
     * @param Tweet $tweet
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(Tweet $tweet)
    {
        if ($tweet->image) {
            $this->deleteImageFile($tweet);
        }
        return $tweet->delete();
    }

    /**
     * Delete the image in images directory with
     * information given by Tweet model
     * @param Tweet $tweet
     * @return bool
     */
    private function deleteImageFile(Tweet $tweet)
    {
        return Storage::delete('images/'.basename($tweet->image));
    }

    /**
     * Get specified tweet with likes
     * @param Tweet $tweet
     * @return mixed
     */
    public function getWithLikes(Tweet $tweet)
    {
        return Tweet::where('id', [$tweet->id])->withLikes()->get()->first();
    }

}
