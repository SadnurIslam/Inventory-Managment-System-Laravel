<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Purchase;
use App\Models\Record;
class ReportController extends Controller
{
    //
    function index() {
        $total_sell = Record::sum('sell');
        $total_purchase = Purchase::sum('quantity');
        $total_buy = Record::sum('buy');
        $total_profit = $total_sell - $total_buy;
        $total_order = Order::count();
        $total_purchase = Purchase::count();
        return view('report',['total_sell'=>$total_sell, 'total_purchase'=>$total_purchase, 'total_buy'=>$total_buy, 'total_profit'=>$total_profit, 'total_order'=>$total_order, 'total_purchase'=>$total_purchase]);
    }
}
