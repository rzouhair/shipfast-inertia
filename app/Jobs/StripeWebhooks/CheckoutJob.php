<?php

namespace App\Jobs\StripeWebhooks;

use App\Helpers\StripeWebhooksHandler;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Spatie\WebhookClient\Models\WebhookCall;

class CheckoutJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $webhookCall;
    /**
     * Create a new job instance.
     */
    public function __construct(WebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $eventType = $this->webhookCall->payload['type'];
        $result = StripeWebhooksHandler::handleWebhooks($this->webhookCall->payload);

        if (!$result)
            return;

        ['user' => $user] = $result;

        $success_status = [
            'checkout.session.completed',
            'checkout.session.async_payment_succeeded',
        ];
        if (in_array($eventType, $success_status)) {
            $user->has_access = true;
            $user->save();
            return;
        }

        $failure_status = [
            'checkout.session.async_payment_failed',
            'checkout.session.failed',
        ];
        if (in_array($eventType, $failure_status)) {
            $user->has_access = false;
            $user->save();
            return;
        }
    }
}
