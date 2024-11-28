<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\Purchase;


class DashboardController extends Controller
{
    public function dashboard()
{
    // Stock Level Data
    $stockData = Inventory::select('category_name', DB::raw('SUM(quantity) as total_quantity'))
        ->groupBy('category_name')
        ->get()
        ->pluck('total_quantity', 'category_name')
        ->toArray();

    $stockResponse = [
        'categories' => array_keys($stockData),
        'quantities' => array_values($stockData),
    ];

    // Highest Selling Products
    $highestSellingData = Order::select('product_name', DB::raw('SUM(quantity) as total_quantity'))
        ->groupBy('product_name')
        ->orderBy('total_quantity', 'desc')
        ->take(5)
        ->get();

    $highestSellingResponse = [
        'products' => $highestSellingData->pluck('product_name'),
        'quantities' => $highestSellingData->pluck('total_quantity'),
    ];

    // Monthly Sales
    $monthlySales = Order::select(
        DB::raw('DATE_FORMAT(created_at, "%M") as month'),
        DB::raw('SUM(quantity * unit_price) as total_sales')
    )
        ->groupBy('month')
        ->orderBy(DB::raw('MIN(created_at)'), 'asc')
        ->get();

    $salesResponse = [
        'months' => $monthlySales->pluck('month'),
        'totals' => $monthlySales->pluck('total_sales'),
    ];

    // Sell vs Buy for Last 7 Days
    $last7Days = Order::select(
        DB::raw('DATE(created_at) as day'),
        DB::raw('SUM(quantity * unit_price) as total_sell')
    )
        ->where('created_at', '>=', now()->subDays(7))
        ->groupBy('day')
        ->orderBy('day', 'asc')
        ->get();

    $last7DaysBuy = Purchase::select(
        DB::raw('DATE(created_at) as day'),
        DB::raw('SUM(quantity * unit_price) as total_buy')
    )
        ->where('created_at', '>=', now()->subDays(7))
        ->groupBy('day')
        ->orderBy('day', 'asc')
        ->get();

    $sellBuyResponse = [
        'days' => $last7Days->pluck('day')->map(fn($date) => \Carbon\Carbon::parse($date)->format('l')), // Convert to day names
        'sell' => $last7Days->pluck('total_sell'),
        'buy' => $last7DaysBuy->pluck('total_buy'),
    ];

    return view('dashboard', compact('stockResponse', 'highestSellingResponse', 'salesResponse', 'sellBuyResponse'));
}

}
