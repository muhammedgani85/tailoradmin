<?php

namespace App\Http\Controllers;

use App\Models\CorrectionNote;
use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CorrectionNoteController extends Controller
{
    public function index()
    {
        $correctionNotes = CorrectionNote::with('type')->latest('id')->get();

        $types = Types::where('status', 'active')
            ->orderBy('type')
            ->get();

        return view('settings.correction.index', compact(
            'correctionNotes',
            'types'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type_id' => [
                'required',
                'integer',
                Rule::exists('types', 'id')->where(fn ($q) => $q->whereNull('deleted_at')),
            ],
            'description' => ['required', 'string', 'max:5000'],
        ], [
            'type_id.required' => 'Please select a type.',
            'type_id.exists' => 'Selected type is invalid.',
            'description.required' => 'Please enter correction notes.',
            'description.max' => 'Correction notes cannot exceed 5000 characters.',
        ]);

        $exists = CorrectionNote::where('type_id', $validated['type_id'])
            ->where('description', $validated['description'])
            ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'The same correction note already exists for this type.',
            ], 422);
        }

        CorrectionNote::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Correction note added successfully.',
        ]);
    }

    public function edit(CorrectionNote $correctionNote)
    {
        return response()->json([
            'success' => true,
            'data' => $correctionNote->load('type'),
        ]);
    }

    public function update(Request $request, CorrectionNote $correctionNote)
    {
        $validated = $request->validate([
            'type_id' => [
                'required',
                'integer',
                Rule::exists('types', 'id')->where(fn ($q) => $q->whereNull('deleted_at')),
            ],
            'description' => ['required', 'string', 'max:5000'],
        ], [
            'type_id.required' => 'Please select a type.',
            'type_id.exists' => 'Selected type is invalid.',
            'description.required' => 'Please enter correction notes.',
            'description.max' => 'Correction notes cannot exceed 5000 characters.',
        ]);

        $exists = CorrectionNote::where('type_id', $validated['type_id'])
            ->where('description', $validated['description'])
            ->where('id', '!=', $correctionNote->id)
            ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'The same correction note already exists for this type.',
            ], 422);
        }

        $correctionNote->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Correction note updated successfully.',
        ]);
    }

    public function destroy(CorrectionNote $correctionNote)
    {
        $correctionNote->delete();

        return response()->json([
            'success' => true,
            'message' => 'Correction note deleted successfully.',
        ]);
    }
}
