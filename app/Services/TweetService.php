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
        $filename = Storage::put('images', $image);
        return basename($filename);
    }

}
