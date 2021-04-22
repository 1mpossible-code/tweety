<?php

namespace App\Http\Controllers;

use App\Events\TweetPosted;
use App\Http\Requests\StoreTweetRequest;
use App\Models\Tweet;
use App\Services\TweetLikeService;
use App\Services\TweetService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * Class TweetController
 * @package App\Http\Controllers
 */
class TweetController extends Controller
{
    /**
     * @var TweetService
     */
    private $tweetService;
    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var TweetLikeService
     */
    private $tweetLikeService;

    /**
     * TweetController constructor.
     * @param TweetService $tweetService
     * @param UserService $userService
     * @param $tweetLikeService
     */
    public function __construct(TweetService $tweetService, UserService $userService, TweetLikeService $tweetLikeService)
    {
        $this->tweetService = $tweetService;
        $this->tweetLikeService = $tweetLikeService;
        $this->userService = $userService;
    }

    /**
     * Showing the tweets page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = auth()->user();
        $timeline = $this->userService->timeline($user, 50);

        return view('tweets.index', [
            'tweets' => $timeline,
            'tweetLikeService' => $this->tweetLikeService,
        ]);
    }

    public function show(Tweet $tweet)
    {
        $tweet = $this->tweetService->getWithLikes($tweet);
        return view('tweets.show', [
            'tweet' => $tweet,
            'tweetLikeService' => $this->tweetLikeService,
            'replies' => $tweet->replies,
        ]);
    }

    /**
     * Store the new tweet
     * @param StoreTweetRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreTweetRequest $request)
    {
        $user = auth()->user();

        $tweet = $this->tweetService->create($user, $request);

        if (!$tweet) {
            Session::flash('error', 'Creating new tweet failed!');
            return back();
        }

        event(new TweetPosted($tweet));

        Session::flash('success', 'New tweet created successfully');
        return redirect()->route('tweets.index');
    }

    /**
     * Check if the user can edit relative objects
     * destroy the specified tweet
     * @param Tweet $tweet
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Tweet $tweet)
    {
        $this->authorize('edit', $tweet->user);
        $this->tweetService->destroy($tweet);
        return back();
    }
}
