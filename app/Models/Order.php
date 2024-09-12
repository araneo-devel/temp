<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Order extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "orders";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        "total_price",
        "financial_status",
        "fulfillment_status",
        "customer_id",
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ["total_price" => "decimal:2", "customer_id" => "int"];

    /**
     * Get the customer that owns the Customer.
     *
     * @return HasOne
     */
    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class, "id", "customer_id");
    }
}
