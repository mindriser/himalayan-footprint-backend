<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
 public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'name' => 'nullable|string|max:255',
            'source' => 'nullable|string|max:255',
        ]);

        // Check if email already exists
        $subscription = Subscription::where('email', $validated['email'])->first();

        if ($subscription) {
            // If unsubscribed → re-activate
            if ($subscription->status === 'unsubscribed') {
                $subscription->update([
                    'status' => 'active',
                    'unsubscribed_at' => null,
                    'subscribed_at' => now(),
                ]);

                return response()->json([
                    'message' => 'Subscription reactivated successfully.',
                ], 200);
            }

            return response()->json([
                'message' => 'You are already subscribed.',
            ], 200);
        }

        // Create new subscription
        Subscription::create([
            'email' => $validated['email'],
            'name' => $validated['name'] ?? null,
            'source' => $validated['source'] ?? null,
            'status' => 'active',
            'subscribed_at' => now(),
        ]);

        return response()->json([
            'message' => 'Subscribed successfully.',
        ], 201);
    }

}
