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
     * @param User $user
     * @return Model
     */
    public function follow(User $user): Model
    {
        return User::follows()->save($user);
    }


    /**
     * Returns a timeline of tweets for selected user
     * @param User $user
     * @return mixed
     */
    public function timeline(User $user)
    {
        $followsIds = $user->follows()->pluck('id');

        return Tweet::whereIn('user_id', $followsIds)
            ->orWhere('user_id', $user->id)
            ->latest()->get();
    }

}
