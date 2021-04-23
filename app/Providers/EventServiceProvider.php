<?php

namespace App\Providers;

use App\Events\ReplyPosted;
use App\Events\TweetPosted;
use App\Listeners\NotifyMentionedUsersInReply;
use App\Listeners\NotifyMentionedUsersInTweet;
use App\Models\Reply;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        TweetPosted::class => [
            NotifyMentionedUsersInTweet::class,
        ],
        ReplyPosted::class => [
            NotifyMentionedUsersInReply::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
