<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    /**
     * Create a new order.
     *
     * @param $data
     * @return Order|Model
     */
    public function create($data): Order|Model
    {
        return Order::query()->create($data);
    }

    /**
     * Truncate the orders table.
     *
     * @return void
     */
    public function truncate(): void
    {
        DB::table('orders')->truncate();
    }
}
