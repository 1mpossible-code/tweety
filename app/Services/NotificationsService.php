<?php


namespace App\Services;


use App\Models\User;

class NotificationsService
{
    public function getNotifications(User $user)
    {
        $notifications = $user->notifications;
        $user->unreadNotifications->markAsRead();
        return $notifications;
    }

    public function destroyNotifications(User $user)
    {
        return $user->notifications()->delete();
    }

    public function hasNotifications(User $user)
    {
        if (count( $user->notifications )){
            return true;
        }
        return false;
    }

}
