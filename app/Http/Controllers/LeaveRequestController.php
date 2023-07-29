<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaveRequestFormRequest;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaveRequests = LeaveRequest::where('user_id', Auth::user()->id)->get();

        return view('leave-requests.index', compact('leaveRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leave-requests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeaveRequestFormRequest $request)
    {
        $user = Auth::user();
        $user->leaveRequests()->create($request->validated());

        return redirect()->route('leave-requests.index')->with('success', 'Leave request submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LeaveRequestFormRequest $leaveRequest)
    {
        if ($leaveRequest->user_id !== Auth::user()->id) {
            return redirect()->route('leave-requests.index')->with('error', 'Unauthorized access.');
        }

        return view('leave-requests.show', compact('leaveRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeaveRequestFormRequest $leaveRequest)
    {
        if ($leaveRequest->user_id !== Auth::user()->id) {
            return redirect()->route('leave-requests.index')->with('error', 'Unauthorized access.');
        }

        return view('leave-requests.edit', compact('leaveRequest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeaveRequestFormRequest $request, LeaveRequest $leaveRequest)
    {
        if ($leaveRequest->user_id !== Auth::user()->id) {
            return redirect()->route('leave-requests.index')->with('error', 'Unauthorized access.');
        }

        $leaveRequest->update($request->validated());

        return redirect()->route('leave-requests.index')->with('success', 'Leave request updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaveRequestFormRequest $leaveRequest)
    {
        if ($leaveRequest->user_id !== Auth::user()->id) {
            return redirect()->route('leave-requests.index')->with('error', 'Unauthorized access.');
        }

        $leaveRequest->delete();

        return redirect()->route('leave-requests.index')->with('success', 'Leave request deleted successfully.');
    }
}
