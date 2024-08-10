<?php

namespace App\Helpers;

use App\Models\Payment;
use App\Models\User;

class StripeWebhooksHandler {
  public static function handleWebhooks($payload) {
    $eventType = $payload['type'];
    $eventObject = $payload['data']['object'];

    $user = User::where('stripe_id', $eventObject['customer'])->first();
    if (!$eventType || !$eventObject || !$user) {
      return null;
    }

    $payment = Payment::create([
      'stripe_id' => $eventObject['id'],
      'stripe_status' => $eventType,
      'user_id' => $user->id,
      'total' => $eventObject['amount_total'],
      'tax' => $eventObject['total_details']['amount_tax'],
      'subtotal' => $eventObject['amount_subtotal'],
    ]);

    return [
      'payment' => $payment,
      'user' => $user,
    ];
  }
}