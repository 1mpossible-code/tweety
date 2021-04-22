<?php


namespace App\Services;


use App\Http\Requests\StoreReplyRequest;
use App\Models\Reply;
use App\Models\Tweet;
use App\Models\User;

class ReplyService
{
    public function create(User $user, Tweet $tweet, StoreReplyRequest $request)
    {
        $body = $request->validated()['body'];

        return Reply::create([
            'user_id' => $user->id,
            'tweet_id' => $tweet->id,
            'body' => $body,
        ]);
    }

    public function destroy(Reply $reply)
    {
        return $reply->delete();
    }
}
