<?php

namespace App\Http\Controllers;

use App\Models\VisaApplication;
use Illuminate\Http\Request;

class VisaApplicationController extends Controller
{
    // 📝 Submit new application
    public function store(Request $request)
    {
        $request->validate([
            'visa_type' => 'required|string',
            'purpose' => 'nullable|string',
        ]);

        $client = $request->user()->client;

        $application = VisaApplication::create([
            'client_id' => $client->id,
            'visa_type' => $request->visa_type,
            'purpose' => $request->purpose,
        ]);

        return response()->json([
            'message' => 'Application submitted',
            'application' => $application,
        ]);
    }

    // 📜 View own applications
    public function index(Request $request)
    {
        $client = $request->user()->client;
        $applications = $client->applications()->latest()->get();

        return response()->json($applications);
    }
}
