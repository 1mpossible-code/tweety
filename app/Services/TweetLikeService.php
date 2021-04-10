<?php


namespace App\Services;


use App\Models\Tweet;
use App\Models\User;

class TweetLikeService
{

    public function setLike(Tweet $tweet, User $user, bool $liked = true)
    {
        $tweet->likes()->updateOrCreate([
            'user_id' => $user->id,
        ], [
            'liked' => $liked
        ]);
    }

    public function toggleLike(Tweet $tweet, User $user, bool $liked = true)
    {
        if ($this->isLikedBy($tweet, $user)) {
            $this->destroyRate($tweet, $user);
        } else {
            $this->setLike($tweet, $user);
        }
    }

    public function setDislike(Tweet $tweet, User $user, bool $liked = false)
    {
        $this->setLike($tweet, $user, $liked);
    }

    public function toggleDislike(Tweet $tweet, User $user, bool $liked = true)
    {
        if ($this->isDislikedBy($tweet, $user)) {
            $this->destroyRate($tweet, $user);
        } else {
            $this->setDislike($tweet, $user);
        }

    }

    public function isLikedBy(Tweet $tweet, User $user, bool $liked = true)
    {
        return (bool)$tweet->likes()->where('user_id', $user->id)
            ->where('liked', $liked)->count();
    }

    public function isDislikedBy(Tweet $tweet, User $user, bool $liked = false)
    {
        return $this->isLikedBy($tweet, $user, $liked);
    }

    public function destroyRate(Tweet $tweet, User $user)
    {
        $tweet->likes()->where('user_id', $user->id)->delete();
    }
}
