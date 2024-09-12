<?php

namespace App\Console\Commands;

use App\Services\ShopifyService;
use Illuminate\Console\Command;

class ImportDataFromShopifyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-data-from-shopify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import all data from Shopify to the application';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        app(ShopifyService::class)
            ->importData();
    }
}
