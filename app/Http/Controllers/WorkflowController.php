<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workflow;
use App\Models\Types;
use Illuminate\Support\Facades\DB;


class WorkflowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // 🔹 LIST
    public function index()
    {
        try {
            $workflows = Workflow::orderBy('id','asc')->get();
$types = Types::where('status','active')->get();

// 🔥 get mapping
$typeWorkflow = DB::table('type_workflows')->get();

// 👉 group by workflow_id
$mapping = [];

foreach($typeWorkflow as $row){
    $mapping[$row->workflow_id][] = $row->type_id;
}
            return view('settings.workflow.workflowlist', ['title' => 'WorkFlow'],compact('workflows', 'types', 'mapping'));

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch data',
                'error' => $e->getMessage()
            ]);
        }
    }

    // 🔹 STORE
    public function store(Request $req)
    {
        try {

            // optional validation
            $req->validate([
                'name' => 'required|max:255'
            ]);

            // duplicate check
            $exists = Workflow::whereRaw('LOWER(name)=?', [strtolower(trim($req->name))])->exists();

            if ($exists) {
                return response()->json([
                    'success' => false,
                    'message' => 'Workflow already exists'
                ]);
            }

             // 🔥 CHECK ORDER_ID DUPLICATE
        $orderExists = Workflow::where('order_id', $req->order_id)->exists();

        if ($orderExists) {
            return response()->json([
                'success' => false,
                'message' => 'WorkFlow ID already exists'
            ]);
        }

            Workflow::create([
                'name' => $req->name,
                'status' => $req->status ?? 'active',
                'description' => $req->description,
                'order_id' => $req->order_id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Workflow created successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Create failed',
                'error' => $e->getMessage()
            ]);
        }
    }

    // 🔹 EDIT (GET SINGLE)
    public function edit($id)
    {
        try {

            $data = Workflow::find($id);

            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'Workflow not found'
                ]);
            }

            return response()->json($data);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data',
                'error' => $e->getMessage()
            ]);
        }
    }

    // 🔹 UPDATE
    public function update(Request $req, $id)
    {
        try {

            $workflow = Workflow::find($id);

            if (!$workflow) {
                return response()->json([
                    'success' => false,
                    'message' => 'Workflow not found'
                ]);
            }

            // duplicate check (exclude current)
            $exists = Workflow::whereRaw('LOWER(name)=?', [strtolower(trim($req->name))])
                        ->where('id', '!=', $id)
                        ->exists();

            if ($exists) {
                return response()->json([
                    'success' => false,
                    'message' => 'Workflow already exists'
                ]);
            }

            $workflow->update([
                'name' => $req->name,
                'status' => $req->status,
                'description' => $req->description
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Workflow updated successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Update failed',
                'error' => $e->getMessage()
            ]);
        }
    }

    // 🔹 DELETE
    public function destroy($id)
    {
        try {

            $workflow = Workflow::find($id);

            if (!$workflow) {
                return response()->json([
                    'success' => false,
                    'message' => 'Workflow not found'
                ]);
            }

            $workflow->delete();

            return response()->json([
                'success' => true,
                'message' => 'Workflow deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Delete failed',
                'error' => $e->getMessage()
            ]);
        }
    }

    // 🔹 TOGGLE STATUS
    public function toggleStatus(Request $req)
    {
        try {

            $workflow = Workflow::find($req->id);

            if (!$workflow) {
                return response()->json([
                    'success' => false,
                    'message' => 'Workflow not found'
                ]);
            }

            $workflow->status = $workflow->status == 'active' ? 'inactive' : 'active';
            $workflow->save();

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Status update failed',
                'error' => $e->getMessage()
            ]);
        }
    }


public function saveTypes(Request $req)
{
    DB::table('type_workflows')
        ->where('workflow_id',$req->workflow_id)
        ->delete();

    if($req->types){
        foreach($req->types as $type_id){
            DB::table('type_workflows')->insert([
                'workflow_id'=>$req->workflow_id,
                'type_id'=>$type_id,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }

    return response()->json(['success'=>true]);
}

}
