<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFederationRequest;
use App\Http\Resources\FederationResource;
use App\Models\Federation;
use App\Models\User;

class FederationController extends Controller
{
    public function index()
    {
        $federations = Federation::with('user')->orderBy('created_at','desc')->paginate(10);
        return FederationResource::collection($federations);
    }

    public function store(StoreFederationRequest $request)
    {
        $user = User::create([
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $federation = Federation::create(array_merge(
            $request->validated(),
            ['user_id' => $user->id]
        ));

        return new FederationResource($federation);
    }

    public function show(int $id)
    {
        $federation = Federation::with('user')->findOrFail($id);
        return new FederationResource($federation);
    }

    public function update(StoreFederationRequest $request, int $id)
    {
        $federation = Federation::findOrFail($id);
        $federation->update($request->validated());
        return new FederationResource($federation);
    }

    public function destroy(int $id)
    {
        $federation = Federation::findOrFail($id);
        $federation->user()->delete();
        $federation->delete();

        return response()->json(['message'=>'Fédération supprimée'],200);
    }
}
