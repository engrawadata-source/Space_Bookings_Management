<?php

namespace App\Http\Controllers;

use App\services\DashboardService;




class DashboardController extends Controller
{
    public function __construct(protected  DashboardService $dashboardService){}

    public function index()
    {
        $statistics = $this->dashboardService->getStatistics();

        return view('dashboard', compact('statistics'));
    }
}
