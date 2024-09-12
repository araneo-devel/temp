<?php

namespace App\Jobs;

use App\Services\ShopifyService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;

class ImportShopifyDataJob implements ShouldQueue
{
    use Queueable;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $service = app(ShopifyService::class);
        $service->truncateAll();
        $service->importData();
    }
}
