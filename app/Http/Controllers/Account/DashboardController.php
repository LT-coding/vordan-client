<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountAddress;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware();
    }

    /**
     * Show the application dashboard.php.
     *
     * @return View
     */
    public function index(): View
    {
        return view('account.dashboard');
    }

    public function referral(): View
    {
        return view('account.referral');
    }
}
