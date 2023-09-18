<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\billboards;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $active = billboards::where('empty', 0)->count();
        $off = billboards::where('empty', 1)->count();
        return view('web.index', compact('active', 'off'));
    }
}
