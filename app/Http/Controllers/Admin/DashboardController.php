<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        return view('admin.dashboard', [
            'products' => Product::get(),
            'userCount' => User::where('role_as', 0)->count(),
            'pendingOrderCount' => Order::where('status', 'pending')->count(),
            'orders' => Order::latest()->get()
        ]);
    }
}
