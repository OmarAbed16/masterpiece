<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Listing;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        // Eager load the Listing relationship and filter by is_deleted = 0 for Booking and Listing
        $orders = Booking::with([
                'listing' => function($query) {
                    $query->where('is_deleted', '0');
                }
            ])
            ->where('is_deleted', '0')
            ->get();
dd($orders);
        return view('dashboard.orders', compact('orders'));
    }
    
    
    
    

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'driver_id' => 'nullable|exists:drivers,id',
            'truck_id' => 'nullable|exists:trucks,id',
            'quantity' => 'required|numeric|min:0.01',
            'address' => 'required|string|max:255',
            'status' => 'required|in:pending,shipping,delivered,canceled',
            'payment_status' => 'required|in:completed,refunded,canceled',
        ]);

        Order::create($data);
        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,shipping,delivered,canceled',
            'payment_status' => 'required|in:completed,refunded,canceled',
        ]);

        $order->update($data);
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy($orderId)
{
    $order = Order::find($orderId);

    if (!$order) {
        return response()->json([
            'success' => false
        ], 404);
    }

    $order->is_deleted = '1';
    $order->save();

    return response()->json([
        'success' => true
    ]);
}

    
}
