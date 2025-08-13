<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ShiftController extends Controller
{
    /**
     * Constructor for the ShiftController
     */
    public function __construct()
    {
        // No need to add middleware here as it's already in the web.php routes file
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check if user has permission to view shifts
        if (!Auth::user()->can('view-shifts') && !Auth::user()->isSuperAdmin()) {
            abort(403, 'Unauthorized action.');
        }
        
        $shifts = Shift::all();
        return view('shifts.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Check if user has permission to create shifts
        if (!Auth::user()->can('create-shifts') && !Auth::user()->isSuperAdmin()) {
            abort(403, 'Unauthorized action.');
        }
        
        // get list of uniquie shift_groups
        $shift_groups = Shift::groupBy('shift_group')->get();
        return view('shifts.create', compact('shift_groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if user has permission to create shifts
        if (!Auth::user()->can('create-shifts') && !Auth::user()->isSuperAdmin()) {
            abort(403, 'Unauthorized action.');
        }
        
        $request->validate([
            'name' => 'required|unique:shifts,name',
            'start_time' => 'required',
            'end_time' => 'required',
            'shift_group' => 'required',
        ]);
        
        // Handle checkbox fields (they are only present in the request if checked)
        $request->merge([
            'next_day' => $request->has('next_day') ? true : false,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        Shift::create($request->all());
        return redirect()->route('shifts.index')->with('success', 'Shift created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shift $shift)
    {
        // Check if user has permission to view shifts
        if (!Auth::user()->can('view-shifts') && !Auth::user()->isSuperAdmin()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('shifts.show', compact('shift'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $shift)
    {
        // Check if user has permission to edit shifts
        if (!Auth::user()->can('edit-shifts') && !Auth::user()->isSuperAdmin()) {
            abort(403, 'Unauthorized action.');
        }
        
        // get list of uniquie shift_groups
        $shift_groups = Shift::groupBy('shift_group')->get();
        return view('shifts.edit', compact('shift', 'shift_groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shift $shift)
    {
        // Check if user has permission to edit shifts
        if (!Auth::user()->can('edit-shifts') && !Auth::user()->isSuperAdmin()) {
            abort(403, 'Unauthorized action.');
        }
        
        $request->validate([
            'name' => 'required|unique:shifts,name,' . $shift->id,
            'start_time' => 'required',
            'end_time' => 'required',
            'shift_group' => 'required',
        ]);
        
        // Handle checkbox fields (they are only present in the request if checked)
        $request->merge([
            'next_day' => $request->has('next_day') ? true : false,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        $shift->update($request->all());
        return redirect()->route('shifts.index')->with('success', 'Shift updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $shift)
    {
        // Check if user has permission to delete shifts
        if (!Auth::user()->can('delete-shifts') && !Auth::user()->isSuperAdmin()) {
            abort(403, 'Unauthorized action.');
        }
        
        $shift->delete();
        return redirect()->route('shifts.index')->with('success', 'Shift deleted successfully');
    }
}
