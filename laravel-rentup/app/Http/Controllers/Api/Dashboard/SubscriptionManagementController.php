<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionManagementController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('dashboard.subscriptions.index', compact('subscriptions'));
    }

    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);
        return view('dashboard.subscriptions.show', compact('subscription'));
    }

    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        return redirect()->route('dashboard.subscriptions.index');
    }
}
