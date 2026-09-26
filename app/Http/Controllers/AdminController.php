<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::with('user')->orderBy('created_at','desc')->paginate(10);
        return AdminResource::collection($admins);
    }

    public function store(StoreAdminRequest $request)
    {
        $user = User::create([
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $admin = Admin::create(array_merge(
            $request->validated(),
            ['user_id' => $user->id]
        ));

        return new AdminResource($admin);
    }

    public function show(int $id)
    {
        $admin = Admin::with('user')->findOrFail($id);
        return new AdminResource($admin);
    }

    public function update(StoreAdminRequest $request, int $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update($request->validated());
        return new AdminResource($admin);
    }

    public function destroy(int $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->user()->delete();
        $admin->delete();

        return response()->json(['message'=>'Admin supprimé'],200);
    }
}
