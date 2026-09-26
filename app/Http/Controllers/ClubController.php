<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClubRequest;
use App\Http\Resources\ClubResource;
use App\Models\Club;
use App\Models\User;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Club::with('user')->orderBy('created_at','desc')->paginate(10);
        return ClubResource::collection($clubs);
    }

    public function store(StoreClubRequest $request)
    {
        $user = User::create([
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $club = Club::create(array_merge(
            $request->validated(),
            ['user_id' => $user->id]
        ));

        return new ClubResource($club);
    }

    public function show(int $id)
    {
        $club = Club::with('user')->findOrFail($id);
        return new ClubResource($club);
    }

    public function update(StoreClubRequest $request, int $id)
    {
        $club = Club::findOrFail($id);
        $club->update($request->validated());
        return new ClubResource($club);
    }

    public function destroy(int $id)
    {
        $club = Club::findOrFail($id);
        $club->user()->delete();
        $club->delete();

        return response()->json(['message'=>'Club supprimé'],200);
    }
}
