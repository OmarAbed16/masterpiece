<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Driver;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::join('payments', 'payments.order_id', '=', 'orders.order_id')
            ->join('drivers', 'drivers.driver_id', '=', 'orders.driver_id') 
            ->join('users as driver_user', 'driver_user.id', '=', 'drivers.user_id') 
            ->join('users as customer', 'customer.id', '=', 'orders.user_id')  
            ->where('orders.is_deleted', '0')
            ->where('drivers.is_deleted', '0') 
            ->where('customer.is_deleted', '0')
            ->select(
                'orders.order_id',
                'orders.created_at',
                'orders.status',
                'orders.quantity',
                'payments.status as payment_status',
                'payments.amount as payment_amount',
                'payments.payment_time as payment_date',
                'payments.method as payment_method',  
                'driver_user.name as driver_name', 
                'driver_user.phone as driver_phone',  
                'customer.name as customer_name',
                'customer.email as customer_email',
                'customer.phone as customer_phone',
                'orders.user_id',
                'orders.order_time',
                'orders.delivery_time' 
            )
            ->get();

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
