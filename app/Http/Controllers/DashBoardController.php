<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;

class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $applications = Application::all();
        $users = User::all();

        // Fetch applications and group them by creation date
        $applicationsByDate = Application::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Prepare data for the chart
        $dates = $applicationsByDate->pluck('date')->toArray();
        $counts = $applicationsByDate->pluck('count')->toArray();

        return view('dashboard.dashboard', compact('applications', 'users', 'dates', 'counts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
