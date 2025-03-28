<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\MembershipLevel;
use App\Models\User;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberships = Membership::with('user', 'membershipLevel')->get();
        return view('memberships.index', compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $membershipLevels = MembershipLevel::all();
        return view('memberships.create', compact('users', 'membershipLevels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'membership_level_id' => 'required|exists:membership_levels,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'active' => 'required|boolean',
            'balance' => 'required|numeric',
        ]);

        Membership::create($request->all());
        return redirect()->route('memberships.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $membership = Membership::with('user', 'membershipLevel')->findOrFail($id);
        return view('memberships.show', compact('membership'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $membership = Membership::findOrFail($id);
        $users = User::all();
        $membershipLevels = MembershipLevel::all();
        return view('memberships.edit', compact('membership', 'users', 'membershipLevels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'membership_level_id' => 'required|exists:membership_levels,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'active' => 'required|boolean',
            'balance' => 'required|numeric',
        ]);

        $membership = Membership::findOrFail($id);
        $membership->update($request->all());
        return redirect()->route('memberships.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $membership = Membership::findOrFail($id);
        $membership->delete();
        return redirect()->route('memberships.index');
    }
}
