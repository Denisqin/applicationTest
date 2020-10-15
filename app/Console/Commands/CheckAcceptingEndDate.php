<?php

namespace App\Console\Commands;

use App\Helpers\OrderStatus\Consideration;
use App\Models\Order;
use Illuminate\Console\Command;

class CheckAcceptingEndDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:acceptingEndDate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders = Order::whereDate('accepting_end_date', '<', date("Y-m-d"))->get();
        foreach ($orders as &$order) {
            $order->changeStatus(new Consideration);
            $order->update(['accepting_end_date' => null]);
        }
        return true;
    }
}
