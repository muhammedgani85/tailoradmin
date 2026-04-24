<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Types;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(){
    $types = Types::latest()->get();
    return view('settings.types.typelist', ['title' => 'Types'],compact('types'));
}

public function store(Request $req)
{
    try {

        // 🔍 VALIDATION (optional but recommended)
        $req->validate([
            'type' => 'required|string|max:255'
        ]);

        // 🔍 CHECK DUPLICATE (case-insensitive)
        $exists = Types::whereRaw('LOWER(type) = ?', [strtolower($req->type)])->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'Type already exists'
            ]);
        }

        // ✅ CREATE
        Types::create([
            'type' => $req->type,
            'status' => $req->status,
            'description' => $req->comments,
            'created_by' => '1', // replace with auth()->user()->id in real app,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Type created successfully'
        ]);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => 'Something went wrong',
            'error' => $e->getMessage() // remove in production
        ]);
    }
}

public function edit($id){
    return Types::find($id);
}

public function update(Request $req, $id)
{
    try {

        // 🔍 Find record
        $type = Types::find($id);

        if (!$type) {
            return response()->json([
                'success' => false,
                'message' => 'Type not found'
            ]);
        }

        // 🔄 Update
        $type->update([
            'type' => $req->type,
            'status' => $req->status,
            'description' => $req->comments
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Type updated successfully'
        ]);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => 'Update failed',
            'error' => $e->getMessage() // remove in production
        ]);
    }
}

public function destroy($id){
    Types::find($id)->delete();
    return response()->json(['success'=>true]);
}





public function toggleStatus(Request $req)
{
    $type = Types::find($req->id);

    if(!$type){
        return response()->json(['success'=>false]);
    }

    $type->status = $type->status == 'active' ? 'inactive' : 'active';
    $type->save();

    return response()->json(['success'=>true]);
}


}
