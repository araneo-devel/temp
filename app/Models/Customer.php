<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Customer extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "customers";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = ["name", "email"];

    /**
     * Get the orders that owns the Order.
     *
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, "customer_id", "id");
    }
}
