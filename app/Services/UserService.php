<?php


namespace App\Services;


use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    /**
     * Subscribes the user to specified another one
     * @param User $subscriber
     * @param User $followed
     * @return Model
     */
    public function follow(User $subscriber, User $followed): Model
    {
        return $subscriber->follows()->save($followed);
    }

    /**
     * Delete the subscription of subscriber to the followed user
     * @param User $subscriber
     * @param User $followed
     * @return int
     */
    public function unfollow(User $subscriber, User $followed): int
    {
        return $subscriber->follows()->detach($followed);
    }

    /**
     * The helper function to toggle the subscription of selected user to another one
     * @param User $subscriber
     * @param User $followed
     * @return array|array[]|Model|int
     */
    public function toggleFollow(User $subscriber, User $followed)
    {
        return $subscriber->follows()->toggle($followed);
    }


    /**
     * Returns true if the subscriber following the checked user and false if not
     * @param User $subscriber
     * @param User $checkedUser
     * @return mixed
     */
    public function isFollowing(User $subscriber, User $checkedUser)
    {
        return $subscriber->follows()->where('following_user_id', $checkedUser->id)->exists();
    }


    /**
     * Returns a timeline of tweets for selected user
     * @param User $user
     * @param int $amount
     * @return mixed
     */
    public function timeline(User $user, int $amount)
    {
        $followsIds = $user->follows()->pluck('id');

        return Tweet::whereIn('user_id', $followsIds)
            ->orWhere('user_id', $user->id)
            ->latest()->paginate($amount);
    }

}
