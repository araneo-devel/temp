<?php

namespace App\Http\Controllers;

use App\Jobs\ImportShopifyDataJob;
use App\Models\Order;
use App\Services\ShopifyService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display list of orders.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services\ShopifyService  $service
     * @return View
     */
    public function index(Request $request, ShopifyService $service): View
    {
        // If necessary, we can enable auto-import if our tables are empty.
        // $service->importIfEmpty();

        $orders = Order::with('customer')
            ->where('total_price', '>', 100)
            ->orderBy('financial_status')
            ->paginate(5);

        if ($request->ajax()) {
            return view('orders.table', compact('orders'));
        }

        return view('orders.index', compact('orders'));
    }

    /**
     * Import data from Shopify.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function importData()
    {
        ImportShopifyDataJob::dispatch();

        return response()->json([
            'message' => 'Importing data from Shopify has been started',
        ]);
    }
}
