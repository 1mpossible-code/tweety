<?php


namespace App\Services;


use App\Models\Tweet;

/**
 * Class TweetService
 * @package App\Services
 */
class TweetService
{
    /**
     * Creates the new Tweet
     * @param $userId
     * @param $body
     * @return mixed
     */
    public function create($userId, $body)
    {
        return Tweet::create([
            'user_id' => $userId,
            'body' => $body
        ]);
    }

}
