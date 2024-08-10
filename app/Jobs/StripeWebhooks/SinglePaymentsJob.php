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
use Spatie\WebhookClient\Models\WebhookCall;

class SinglePaymentsJob implements ShouldQueue
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

        $success_status = ['payment_intent.succeeded', 'charge.succeeded'];
        if (in_array($eventType, $success_status)) {
            $user->has_access = true;
            $user->save();
        }

        $failure_status = ['payment_intent.failed', 'charge.failed'];
        if (in_array($eventType, $failure_status)) {
            $user->has_access = false;
            $user->save();
        }
    }
}
