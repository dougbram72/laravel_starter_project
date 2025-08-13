<?php

namespace App\Http\Controllers;

use App\Models\ShiftEntry;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ShiftEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shift_entries = ShiftEntry::with('user')->get();
        return view('shift_entries.index', compact('shift_entries'));
    }
    
    /**
     * Display shift entries for a specific date.
     */
    public function daily($date = null)
    {
        // If no date provided, use today's date
        $date = $date ? Carbon::parse($date) : Carbon::today();
        
        // Get shift entries for the selected date
        $shift_entries = ShiftEntry::with('user')
            ->whereDate('start_time', '<=', $date)
            ->whereDate('end_time', '>=', $date)
            ->get()
            ->groupBy('shift_group');
            
        return view('shift_entries.daily', compact('shift_entries', 'date'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shifts = Shift::all();
        $users = User::all();
        return view('shift_entries.create', compact('shifts', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'nullable|integer|exists:users,id',
            'start_date' => 'required',
            'start_time' => 'required',
            'end_date' => 'required',
            'end_time' => 'required',
            'shift_id' => 'required',
        ]);

        //get the shift name from the shift_id
        $shift = Shift::find($request->shift_id);
        
        // Convert start and end times to DateTime objects and add shift name and shift group
        $request->merge([
            'shift_name' => $shift->name,
            'shift_group' => $shift->shift_group,
            'start_time' => \Carbon\Carbon::parse($request->start_date . ' ' . $request->start_time)->format('Y-m-d H:i:s'),
            'end_time' => \Carbon\Carbon::parse($request->end_date . ' ' . $request->end_time)->format('Y-m-d H:i:s'),
        ]);

        ShiftEntry::create($request->all());

        return redirect()->route('shift_entries.index')->with('success', 'Shift entry created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShiftEntry $shiftEntry)
    {
        return view('shift_entries.show', compact('shiftEntry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShiftEntry $shiftEntry)
    {
        $shifts = Shift::all();
        $users = User::all();
        return view('shift_entries.edit', compact('shiftEntry', 'shifts', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShiftEntry $shiftEntry)
    {
        $request->validate([
            'user_id' => 'nullable|integer|exists:users,id',
            'start_date' => 'required',
            'start_time' => 'required',
            'end_date' => 'required',
            'end_time' => 'required',
            'shift_id' => 'required',
        ]);

        // Get the shift name from the shift_id
        $shift = Shift::find($request->shift_id);
        
        // Convert start and end times to DateTime objects and add shift name and shift group
        $startTime = \Carbon\Carbon::parse($request->start_date . ' ' . $request->start_time)->format('Y-m-d H:i:s');
        $endTime = \Carbon\Carbon::parse($request->end_date . ' ' . $request->end_time)->format('Y-m-d H:i:s');
        
        $shiftEntry->update([
            'user_id' => $request->user_id,
            'shift_id' => $request->shift_id,
            'shift_name' => $shift->name,
            'shift_group' => $shift->shift_group,
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);

        return redirect()->route('shift_entries.index')->with('success', 'Shift entry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShiftEntry $shiftEntry)
    {
        $shiftEntry->delete();
        return redirect()->route('shift_entries.index')->with('success', 'Shift entry deleted successfully');
    }
}
