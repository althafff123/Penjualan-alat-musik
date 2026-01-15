<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\CheckoutPembelajaran;
use Illuminate\Http\Request;
use App\Services\Midtrans\CallbackService;

class PaymentCallbackController extends Controller
{
    public function receive()
    {
        $callback = new CallbackService;

        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $checkout = $callback->getCheckout();

            $class = get_class($checkout);

            if ($callback->isSuccess()) {
                if ($class == 'App\Models\Checkout') {
                    Checkout::where('id', $checkout->id)->update([
                        'status' => 2,
                    ]);
                } else {
                    CheckoutPembelajaran::where('id', $checkout->id)->update([
                        'status' => 2,
                    ]);
                }
            }

            if ($callback->isExpire()) {
                if ($class == 'App\Models\Checkout') {
                    Checkout::where('id', $checkout->id)->update([
                        'status' => 6,
                    ]);
                } else {
                    CheckoutPembelajaran::where('id', $checkout->id)->update([
                        'status' => 6,
                    ]);
                }
            }

            if ($callback->isCancelled()) {
                if ($class == 'App\Models\Checkout') {
                    Checkout::where('id', $checkout->id)->update([
                        'status' => 6,
                    ]);
                } else {
                    CheckoutPembelajaran::where('id', $checkout->id)->update([
                        'status' => 6,
                    ]);
                }
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notification successfully processed',
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key not verified',
                ], 403);
        }
    }
}
