<?php

namespace App\Listeners;

use App\Events\ReplyPosted;
use App\Models\User;
use App\Notifications\YouWereMentionedInReply;
use App\Services\MentionService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyMentionedUsersInReply implements ShouldQueue
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
     * @param  ReplyPosted  $event
     * @return void
     */
    public function handle(ReplyPosted $event)
    {
        $mentionService = new MentionService();
        $usernames = $mentionService->mentnionedUsers($event->reply);
        User::whereIn('username', $usernames)->get()->each(function ($user) use ($event) {
            $user->notify(new YouWereMentionedInReply($event->reply));
        });
    }
}
