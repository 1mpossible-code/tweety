<?php

namespace App\Listeners;

use App\Events\TweetPosted;
use App\Models\User;
use App\Notifications\YouWereMentionedInTweet;
use App\Services\MentionService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyMentionedUsersInTweet implements ShouldQueue
{
    use Queueable;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TweetPosted  $event
     * @return void
     */
    public function handle(TweetPosted $event)
    {
        $mentionService = new MentionService();
        $usernames = $mentionService->mentnionedUsers($event->tweet);
        User::whereIn('username', $usernames)->get()->each(function ($user) use ($event) {
            $user->notify(new YouWereMentionedInTweet($event->tweet));
        });
    }
}
