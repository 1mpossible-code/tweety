<?php

namespace App\Http\Controllers;

use App\Events\ReplyPosted;
use App\Http\Requests\StoreReplyRequest;
use App\Models\Reply;
use App\Models\Tweet;
use App\Services\ReplyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReplyController extends Controller
{
    private $replyService;

    /**
     * ReplyController constructor.
     * @param $replyService
     */
    public function __construct(ReplyService $replyService)
    {
        $this->replyService = $replyService;
    }

    public function store(Tweet $tweet, StoreReplyRequest $request)
    {
        $user = auth()->user();

        $reply = $this->replyService->create($user, $tweet, $request);

        if (!$reply) {
            Session::flash('error', 'Creating new reply failed!');
        } else {
            Session::flash('success', 'New reply created successfully');
            event(new ReplyPosted($reply));
        }

        return back();
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('edit', $reply->user);
        $this->replyService->destroy($reply);
        return back();
    }
}
