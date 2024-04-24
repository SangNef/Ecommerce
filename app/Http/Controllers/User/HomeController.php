<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $products = Product::with('images')
            ->withCount('orderDetails')
            ->with(['reviews' => function ($query) {
                $query->selectRaw('AVG(rating) as average_rating, product_id')
                    ->groupBy('product_id');
            }])
            ->orderBy('order_details_count', 'desc')
            ->take(8)
            ->get();

        // dd($products);

        return view('user.pages.home', compact('products'));
    }
}
