<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeagueRequest;
use App\Http\Resources\LeagueResource;
use App\Models\League;
use Illuminate\Http\Request;
use App\Models\User;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leagues = League::with('user')->orderBy('created_at','desc')->paginate(10);
        return LeagueResource::collection($leagues);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeagueRequest $request)
    {
        // Créer d’abord le User
        $user = User::create([
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Créer ensuite la League liée au User
        $league = League::create(array_merge(
            $request->validated(),
            ['user_id' => $user->id]
        ));

        return new LeagueResource($league);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $league = League::with('user')->findOrFail($id);
        return new LeagueResource($league);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreLeagueRequest $request, int $id)
    {
        $league = League::findOrFail($id);
        $league->update($request->validated());
        return new LeagueResource($league);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $league = League::findOrFail($id);

        // Supprimer aussi le User lié si nécessaire
        $league->user()->delete();
        $league->delete();

        return response()->json(['message'=>'Ligue supprimée'],200);
    }
}
