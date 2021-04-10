<?php

namespace App\Http\Controllers;

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

    /**
     * Store the new tweet
     * @param StoreTweetRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreTweetRequest $request)
    {
        $user = auth()->user();
        $body = $request->validated()['body'];

        if (!$this->tweetService->create($user, $body)) {
            Session::flash('error', 'Creating new tweet failed!');
            return back();
        }

        return redirect()->route('tweets.index');
    }
}
