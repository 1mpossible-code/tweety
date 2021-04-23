<?php

namespace App\Http\Controllers;

use App\Services\NotificationsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NotificationsController extends Controller
{
    private $notificationsService;

    /**
     * NotificationsController constructor.
     */
    public function __construct(NotificationsService $notificationsService)
    {
        $this->notificationsService = $notificationsService;
    }

    public function index()
    {
        $user = auth()->user();
        $notifications = $this->notificationsService->getNotifications($user);
        return view('notifications', [
            'notifications' => $notifications,
        ]);
    }

    public function destroy()
    {
        $user = auth()->user();
        if (!$this->notificationsService->hasNotifications($user)) {
            Session::flash('success', 'You have no notifications!');
        } else if ($this->notificationsService->destroyNotifications($user)) {
            Session::flash('success', 'Successfully deleted all notifications!');
        } else {
            Session::flash('error', 'Error while deleting notifications!');
        }

        return back();
    }
}
