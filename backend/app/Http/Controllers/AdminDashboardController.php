<?php

namespace App\Http\Controllers;

use App\Models\VisaApplication;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    // ✅ List all applications (optionally filter by status)
    public function index(Request $request)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $query = VisaApplication::with(['client.user', 'documents']);

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $applications = $query->latest()->get();

        return response()->json($applications);
    }

    // ✅ Show one full application (by ID)
    public function show(Request $request, $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $application = VisaApplication::with(['client.user', 'documents'])->findOrFail($id);

        return response()->json($application);
    }

    // ✅ Update application status
    public function updateStatus(Request $request, $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'status' => 'required|in:under_review,approved,rejected',
        ]);

        $application = VisaApplication::findOrFail($id);
        $application->status = $request->status;
        $application->save();

        return response()->json([
            'message' => 'Application status updated',
            'application' => $application,
        ]);
    }
}
