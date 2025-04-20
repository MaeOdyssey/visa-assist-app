<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Document;
use App\Models\VisaApplication;

class DocumentController extends Controller
{
    // ✅ Upload a document
    public function store(Request $request, $applicationId)
    {
        $request->validate([
            'file' => 'required|file|max:5120', // 5MB limit
            'type' => 'nullable|string|in:passport,id,photo,other',
        ]);

        $application = VisaApplication::findOrFail($applicationId);

        // Verify user owns this app
        if ($request->user()->role === 'client' && $application->client->user_id !== $request->user()->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $file = $request->file('file');
        $path = $file->store('documents', 'public');

        $document = Document::create([
            'visa_application_id' => $application->id,
            'name' => $file->getClientOriginalName(),
            'path' => $path,
            'type' => $request->input('type', 'other'),
        ]);

        return response()->json([
            'message' => 'Document uploaded',
            'document' => $document,
        ]);
    }

    // ✅ List documents for a visa application
    public function index(Request $request, $applicationId)
    {
        $application = VisaApplication::with('documents')->findOrFail($applicationId);

        // Check access
        if ($request->user()->role === 'client' && $application->client->user_id !== $request->user()->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json($application->documents);
    }

    // ✅ Approve document
    public function approve(Request $request, $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $document = Document::findOrFail($id);
        $document->status = 'approved';
        $document->save();

        return response()->json(['message' => 'Document approved', 'document' => $document]);
    }

    // ❌ Reject document
    public function reject(Request $request, $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $document = Document::findOrFail($id);
        $document->status = 'rejected';
        $document->save();

        return response()->json(['message' => 'Document rejected', 'document' => $document]);
    }

}
