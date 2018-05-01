<?php

namespace App\Listeners;

use App\Events\UpdateEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PopUpBox
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
     * @param  UpdateEvent  $event
     * @return void
     */
    public function handle(UpdateEvent $event)
    {

    }
}
