<?php

namespace App\Http\Controllers;

use App\Models\Bureau;
use App\Http\Resources\BureauResource;
use App\Http\Requests\StoreBureauRequest;
use Illuminate\Http\Request;

class BureauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bureaus = Bureau::with(['user', 'club', 'league', 'federation'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return BureauResource::collection($bureaus);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBureauRequest $request)
    {
        $bureau = Bureau::create($request->validated());
        return new BureauResource($bureau);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $bureau = Bureau::with(['user', 'club', 'league', 'federation'])->findOrFail($id);
        return new BureauResource($bureau);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBureauRequest $request, int $id)
    {
        $bureau = Bureau::findOrFail($id);
        $bureau->update($request->validated());
        return new BureauResource($bureau);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $bureau = Bureau::findOrFail($id);
        $bureau->delete();

        return response()->json(['message' => 'Bureau supprimé'], 200);
    }
}
