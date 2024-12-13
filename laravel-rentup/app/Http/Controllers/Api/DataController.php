<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class DataController extends Controller
{
    public function getData()
    {
        // Example datahh
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
        ];

        return response()->json($data);
    }
}
