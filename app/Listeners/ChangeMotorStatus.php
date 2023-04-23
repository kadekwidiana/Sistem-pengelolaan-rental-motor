<?php

namespace App\Listeners;

use App\Models\Transaksi;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeMotorStatus
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $motor = $event->transaksi->motor;
        $motor->status = 1;
        $motor->save();
    }
}
