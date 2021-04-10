<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Services\TweetLikeService;
use Illuminate\Http\Request;

class TweetLikeController extends Controller
{
    private $tweetService;
    /**
     * TweetLikeController constructor.
     * @param $tweetLikeService
     */
    public function __construct(TweetLikeService $tweetLikeService)
    {
        $this->tweetService = $tweetLikeService;
    }

    public function store(Tweet $tweet)
    {
        $this->tweetService->toggleLike($tweet, auth()->user());
        return back();

    }

    public function destroy(Tweet $tweet)
    {
        $this->tweetService->toggleDislike($tweet, auth()->user());
        return back();
    }
}
