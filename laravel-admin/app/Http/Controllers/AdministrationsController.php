<?php

namespace App\Http\Controllers;

use App\Models\Administration;
use Illuminate\Http\Request;

class AdministrationsController extends Controller
{
    public function index()
    {
        $administrations = Administration::all();
        return view('administrations.index', compact('administrations'));
    }

    public function create()
    {
        return view('administrations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|string|max:50',
            'permissions' => 'required|array',
        ]);

        Administration::create($data);
        return redirect()->route('administrations.index')->with('success', 'Administration created successfully.');
    }

    public function show(Administration $administration)
    {
        return view('administrations.show', compact('administration'));
    }

    public function edit(Administration $administration)
    {
        return view('administrations.edit', compact('administration'));
    }

    public function update(Request $request, Administration $administration)
    {
        $data = $request->validate([
            'role' => 'required|string|max:50',
            'permissions' => 'required|array',
        ]);

        $administration->update($data);
        return redirect()->route('administrations.index')->with('success', 'Administration updated successfully.');
    }

    public function destroy(Administration $administration)
    {
        $administration->delete();
        return redirect()->route('administrations.index')->with('success', 'Administration deleted successfully.');
    }
}
