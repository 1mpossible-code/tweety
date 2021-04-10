<?php


namespace App\Services;


use App\Models\Tweet;
use App\Models\User;

/**
 * Class TweetService
 * @package App\Services
 */
class TweetService
{
    /**
     * Creates the new Tweet
     * @param User $user
     * @param $body
     * @return mixed
     */
    public function create(User $user, $body)
    {
        return Tweet::create([
            'user_id' => $user->id,
            'body' => $body
        ]);
    }

}
