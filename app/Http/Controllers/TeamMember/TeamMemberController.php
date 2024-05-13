<?php

namespace App\Http\Controllers\TeamMember;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamMemberPost;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = TeamMember::all();
        return view('admin.team-members.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team-members.create_members');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamMemberPost $request)
    {
        $validated = $request->validated();
        if($request->hasFile('image')){
            $path = time().'.'.$request->file('image')->getClientOriginalExtension();
            $validated['image'] = $request->file('image')->storeAs('team-members',$path,'public');
            TeamMember::create($validated);
            return to_route('team-members.index');
        }else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamMember $team_member)
    {
        return view('admin.team-members.edit_member',compact('team_member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamMember $member)
    {
        if($member->image){
            if(file_exists(public_path('storage/'.$member->image))){
                unlink(public_path('storage/'.$member->image));
            }
        }
        $member->delete();
        return redirect()->back();
    }
}
