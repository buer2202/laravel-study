<?php

namespace App\Listeners;

use App\Events\SomeEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestListener
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
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle(SomeEvent $event)
    {
        dump('TestListener');
        // return false;
    }
}
