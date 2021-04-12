<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use App\Services\PasswordService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UpdatePasswordController extends Controller
{
    /**
     * @var PasswordService
     */
    private $passwordService;

    /**
     * UpdatePasswordController constructor.
     */
    public function __construct(PasswordService $passwordService)
    {
        $this->passwordService = $passwordService;
    }

    public function edit(User $user)
    {
        $this->authorize('edit', $user);
        return view('auth.passwords.edit', compact('user'));
    }

    public function store(User $user, UpdatePasswordRequest $request)
    {
        $this->authorize('edit', $user);

        if (!$this->passwordService->update($user, $request)) {
            Session::flash('error', 'Password update failed!');
            return back();
        }

        Session::flash('success', 'Password update successful!');
        return back();
    }
}
