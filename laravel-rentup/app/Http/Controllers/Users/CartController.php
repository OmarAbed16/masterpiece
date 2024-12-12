<?php

namespace App\Http\Controllers\Users;

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('is_deleted', 0)->get();
        return view('users.carts.index', compact('carts'));
    }

    public function show($id)
    {
        $cart = Cart::where('is_deleted', 0)->findOrFail($id);
        return view('users.carts.show', compact('cart'));
    }
}
