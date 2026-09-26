<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Http\Requests\StoreLogRequest;
use App\Http\Resources\LogResource;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logs = Log::with('user')->orderBy('created_at','desc')->paginate(10);
        return LogResource::collection($logs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLogRequest $request)
    {
        $log = Log::create($request->validated());
        return new LogResource($log);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $log = Log::with('user')->findOrFail($id);
        return new LogResource($log);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $log = Log::findOrFail($id);
        $log->delete();

        return response()->json(['message' => 'Log supprimé'], 200);
    }
}
