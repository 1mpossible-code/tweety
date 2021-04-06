<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Services\ProfileService;
use App\Services\UserService;
use Illuminate\Support\Facades\Session;

/**
 * Class ProfileController
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var ProfileService
     */
    private $profileService;

    /**
     * ProfileController constructor.
     * @param UserService $userService
     * @param $profileService
     */
    public function __construct(UserService $userService, ProfileService $profileService)
    {
        $this->userService = $userService;
        $this->profileService = $profileService;
    }

    /**
     * Show the profile of the requested user
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        $checkingUser = auth()->user();
        $isFollowing = $this->userService->isFollowing($checkingUser, $user);
        return view('profile.show', compact('user', 'isFollowing'));
    }

    /**
     * Show the profile edit page
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('edit', $user);
        return view('profile.edit', compact('user'));
    }

    /**
     * Saved updated data of the profile
     * @param User $user
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(User $user, UpdateProfileRequest $request)
    {
        $this->authorize('update', $user);

        if (!$this->profileService->update($user, $request)) {
            Session::flash('error', 'Profile update failed!');
            return back();
        }

        Session::flash('success', 'Profile updated successfully!');
        return redirect()->route('profile', $user);

    }
}
