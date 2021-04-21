<?php

namespace App\Events;

use App\Models\Tweet;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TweetPosted
{
    use Dispatchable, SerializesModels;

    public $tweet;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Tweet $tweet)
    {
        $this->tweet = $tweet;
    }
}
