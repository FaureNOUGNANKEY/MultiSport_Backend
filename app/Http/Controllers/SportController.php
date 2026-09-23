<?php

namespace App\Http\Controllers;

use App\Http\Resources\SportResource;
use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sport = Sport::orderBy('created_at','desc')->paginate(10);
        return SportResource::collection($sport);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sport = Sport::create($request->validated());
        return new SportResource($sport);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $sport = Sport::firstOrFail($id);
        return new SportResource($sport);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $sport = Sport::findOrFail($id);
        $sport->update($request->validated());
        return new SportResource($sport);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $sport = Sport::destroy($id);
        return response()->json(['message'=>'Sport supprimé'],200);
    }
}
