<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Exception\FirebaseException;
use Session;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // FirebaseAuth.getInstance().getCurrentUser();
        try {
            $uid = Session::get('uid');
            $user = app('firebase.auth')->getUser($uid);
            return view('backend.layouts.dashboard');
        } catch (\Exception $e) {
            return $e;
        }

    }
}
