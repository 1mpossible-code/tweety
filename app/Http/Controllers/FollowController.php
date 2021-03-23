<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * FollowController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(User $user)
    {
        $subscriber = auth()->user();
        $this->userService->toggleFollow($subscriber, $user);

        return back();
    }
}
