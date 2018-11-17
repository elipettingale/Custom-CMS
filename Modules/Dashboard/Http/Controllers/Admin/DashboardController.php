<?php

namespace Modules\Dashboard\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct()
    {
        register_breadcrumb('Dashboard', null);
    }

    public function show(): View
    {
        return view('dashboard::admin.dashboard.show');
    }
}
