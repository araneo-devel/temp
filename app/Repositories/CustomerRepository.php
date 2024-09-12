<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomerRepository
{
    /**
     * Create or update customer.
     *
     * @param $data
     * @return Model|Customer
     */
    public function createOrUpdate($data): Model|Customer
    {
        return isset($data['email']) && $data['email'] ? Customer::query()->updateOrCreate(
            ['email' => $data['email']],
            ['name' => $data['first_name'] . ' ' . $data['last_name']]
        ) : Customer::query()->updateOrCreate(
            ['name' => $data['first_name'] . ' ' . $data['last_name']]
        );
    }

    /**
     * Truncate the customer table.
     *
     * @return void
     */
    public function truncate(): void
    {
        DB::table('customers')->truncate();
    }
}
