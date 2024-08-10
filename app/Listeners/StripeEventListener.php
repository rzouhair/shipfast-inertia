<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(WebhookReceived $event): void
    {
        $type = $event->payload['type'];

        if  ($type === 'checkout.session.completed') {
            print('checkout.session.completed');
            // Handle the incoming event...
        }

        if ($type === 'invoice.payment_succeeded') {
            // Handle the incoming event...
        }
    }
}
