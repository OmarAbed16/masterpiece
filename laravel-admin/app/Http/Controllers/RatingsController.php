<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Driver;
use App\Models\User;
use App\Models\Payment;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    public function index()
{
    // Fetch ratings and related data by joining the relevant tables
    $ratings = Rating::join('orders', 'ratings.order_id', '=', 'orders.order_id')
        ->join('users as customer', 'ratings.customer_id', '=', 'customer.id')
        ->join('drivers', 'ratings.driver_id', '=', 'drivers.driver_id')  // Corrected join with drivers
        ->join('users as driver_user', 'drivers.user_id', '=', 'driver_user.id')  // Join to get driver info from users table
        ->where('ratings.is_deleted', '0')
        ->where('orders.is_deleted', '0')
        ->where('customer.is_deleted', '0')
        ->where('driver_user.is_deleted', '0')
        ->select(
            'ratings.*',
            'orders.order_id',
            'customer.id',
            'customer.name as customer_name',
            'customer.phone as customer_phone',
            'driver_user.name as driver_name',  // Corrected to driver_user.name
            'driver_user.phone as driver_phone',  // Corrected to driver_user.phone
            'orders.order_time',
            'drivers.driver_id',
            
        )
        ->get();

    return view('dashboard.reviews', compact('ratings'));
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

    public function destroy($id)
{
    $rating = Rating::find($id);

    if (!$rating) {
        return response()->json(['success' => false], 404);
    }

    $rating->is_deleted = '1';
    $rating->save();

    return response()->json(['success' => true]);
}


    
}
