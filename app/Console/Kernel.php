<?php

namespace App\Console;

use App\Models\Order;
use App\Mail\OrderEndingSoon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            Log::info('Scheduler is running.');

            // Calculate 28 days from now
            $endDateThreshold = now()->addDays(28);

            // Query orders that will end within 28 days from their start_date
            $orders = Order::where('start_date', '<=', $endDateThreshold)
                           ->whereDate('end_date', '>', now())
                           ->get();

            if ($orders->isEmpty()) {
                Log::info('No orders found that meet the criteria.');
            }

            foreach ($orders as $order) {
                try {
                    // Send email notification
                    Mail::to('ilyashilane@gmail.com')->send(new OrderEndingSoon($order));
                    Log::info('Email sent for order ID: ' . $order->id);
                } catch (\Exception $e) {
                    Log::error('Error sending email for order ID: ' . $order->id . ' - ' . $e->getMessage());
                }
            }
        })->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
