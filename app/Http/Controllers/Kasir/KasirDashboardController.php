<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KasirDashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard');
    }
}
