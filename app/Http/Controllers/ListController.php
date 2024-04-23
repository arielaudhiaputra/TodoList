<?php

namespace App\Http\Controllers;

use App\Models\ListSchadule;
use Illuminate\Http\Request;
use Auth;

class ListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listSuccess = ListSchadule::where('status', 3)->get();
        $listProgress = ListSchadule::where('status', 2)->get();
        $list = ListSchadule::where('status', 1)->get();

        return view('dashboard', compact('listSuccess', 'listProgress', 'list'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required|in:1,2',
        ]);

        $data = new ListSchadule();
        $data->id_users = Auth::user()->id;
        $data->name = $request->name;
        $data->status = $request->status;
        $data->save();

        // Response
        try {
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $list = ListSchadule::findOrFail($request->idList);
            $list->status = $request->idStatus;
            $list->save();

            return response()->json([
                'status' => "success",
                'data' => $list
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => "error",
                'message' => 'Terjadi Kesalahan:' . $e->getMessage()
            ], 500); // atau kode status yang sesuai dengan jenis kesalahan
        }
    }
    public function delete(Request $request)
    {
        try {
            $list = ListSchadule::findOrFail($request->idList);
            $list->delete();

            return response()->json([
                'status' => "success",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => "error",
                'message' => 'Terjadi Kesalahan:' . $e->getMessage()
            ], 500); // atau kode status yang sesuai dengan jenis kesalahan
        }
    }
}
