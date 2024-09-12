<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Order;
use App\Repositories\CustomerRepository;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\DB;

class ShopifyService
{
    /**
     * Create a new ShopifyService instance.
     *
     * @param  \App\Repositories\CustomerRepository  $customerRepo
     * @param  \App\Repositories\OrderRepository  $orderRepo
     */
    public function __construct(
        protected CustomerRepository $customerRepo,
        protected OrderRepository $orderRepo
    ) {
    }

    /**
     * Import data from Shopify API.
     *
     * @return void
     */
    public function importData(): void
    {
        $orders = $this->fetchOrdersFromShopify();
        $customers = $this->fetchCustomersFromShopify();

        foreach ($customers as $shopifyCustomer) {
            if ($customer = $this->customerRepo->createOrUpdate($shopifyCustomer)) {
                foreach ($orders as $order) {
                    if (
                        isset($order['customer'])
                        && $order['customer']['id'] == $shopifyCustomer['id']
                    ) {
                        $this->orderRepo->create([
                            'customer_id' => $customer->id,
                            'total_price' => $order['total_price'],
                            'financial_status' => $order['financial_status'] ?? 'pending',
                            'fulfillment_status' => $order['fulfillment_status'] ?? 'unfulfilled',
                        ]);
                    }
                }
            }
        }
    }

    /**
     * Truncate all tables.
     *
     * @return void
     */
    public function truncateAll(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->orderRepo->truncate();
        $this->customerRepo->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Import data from Shopify API if tables are empty.
     *
     * @return void
     */
    public function importIfEmpty(): void
    {
        if (
            Order::query()->doesntExist()
            && Customer::query()->doesntExist()
        ) {
            $this->importData();
        }
    }

    /**
     * Call Shopify API for orders here.
     *
     * @return array
     */
    private function fetchOrdersFromShopify(): array
    {
        return $this->makeCurlRequest('orders');
    }

    /**
     * Call Shopify API for customers here.
     *
     * @return array
     */
    private function fetchCustomersFromShopify(): array
    {
        return $this->makeCurlRequest('customers');
    }

    /**
     * Make a cURL request to Shopify API.
     *
     * @param $path
     * @return array
     */
    private function makeCurlRequest($path): array
    {
        $url = config('services.shopify.url').'/admin/'.$path.'.json';
        $userPwd = config('services.shopify.login').":".config('services.shopify.password');
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $userPwd);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true)[$path] ?? [];
    }
}
