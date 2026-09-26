<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Resources\MemberResource;
use App\Models\Member;
use App\Models\User;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::with('user')->orderBy('created_at','desc')->paginate(10);
        return MemberResource::collection($members);
    }

    public function store(StoreMemberRequest $request)
    {
        $user = User::create([
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $member = Member::create(array_merge(
            $request->validated(),
            ['user_id' => $user->id]
        ));

        return new MemberResource($member);
    }

    public function show(int $id)
    {
        $member = Member::with('user')->findOrFail($id);
        return new MemberResource($member);
    }

    public function update(StoreMemberRequest $request, int $id)
    {
        $member = Member::findOrFail($id);
        $member->update($request->validated());
        return new MemberResource($member);
    }

    public function destroy(int $id)
    {
        $member = Member::findOrFail($id);
        $member->user()->delete();
        $member->delete();

        return response()->json(['message'=>'Membre supprimé'],200);
    }
}
