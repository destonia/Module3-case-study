<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    protected $orderService;
    public function __construct(OrderService $orderService){
        $this->orderService = $orderService;
    }
    public function showRecentOrder()
    {
        $recentOrder = $this->orderService->showRecentOrder();
        return view('dashboard', compact('recentOrder'));
    }
    public function showAllRecentOrder()
    {
        $recentOrder = $this->orderService->showAllRecentOrder();
        return view('dashboard', compact('recentOrder'));
    }
}
