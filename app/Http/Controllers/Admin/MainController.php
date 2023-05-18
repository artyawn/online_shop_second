<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class MainController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $products = Product::all()->count();
        $categories = Category::all()->count();
        $orders = Order::all()->count();

        return view('admin.main.index', compact('users', 'products', 'categories', 'orders'));
    }
}
