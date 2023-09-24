<?php

namespace App\Http\Controllers\Backoffice;

use App\Contracts\BillboardContract;
use App\Http\Controllers\Controller;
use App\Models\billboards;
use App\Repositories\BillboardRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private BillboardContract $billboardRepo;
    public function __construct()
    {
        $this->billboardRepo = new BillboardRepository;
    }
    public function index()
    {
        $active = billboards::where('empty', 1)->count();
        $off = billboards::where('empty', 0)->count();
        return view('backoffice.dashboard', compact('active', 'off'));
    }
}
