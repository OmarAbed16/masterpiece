<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscribeController extends Controller
{
    public function index()
    {
        $Messages =  Subscription::all();
        return view('dashboard.messages.messages', compact('Messages'));
    }
}
