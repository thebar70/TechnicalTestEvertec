<?php

namespace App\Console\Commands;

use App\ActionClass\Placetopay\GenerateAuthPlacetopayAction;
use App\ActionClass\Placetopay\CallPlacetopayAction;
use App\Services\Api\PlacetopayImpl;
use Illuminate\Console\Command;
use App\Models\Order;

class CheckPaymentStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:payment_status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the payment status of the orders that have this pending process';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    protected $placetopay_manager;

    public function __construct(PlacetopayImpl $placetopay_manager)
    {
        parent::__construct();
        $this->placetopay_manager = $placetopay_manager;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Order::where('waiting_status_response', true)
            ->chunk(100, function ($orders) {
                $orders->each(function ($order) {
                    $this->placetopay_manager->checkPaymentStatus($order);
                });
            });
    }
}
