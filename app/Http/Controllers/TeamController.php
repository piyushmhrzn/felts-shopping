<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function index()
    {
        $members = Team::orderBy('order','desc')->paginate(12);
        return view('admin.team.team')->with('members',$members);
    }

    public function create()
    {
        return view('admin.team.addMember');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'designation' => 'required|min:2'
        ]);

        $member = new Team;

        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $request->file('image')->move(public_path() . '/uploads/TeamMembers', $fileNameToStore);
            $member->image = $fileNameToStore;
        }
        
        $member->name = $request->input('name');
        $member->post = $request->input('designation');
        $member->description = $request->input('bio'); 
        $member->order = (Team::count()) + 1;      
        $member->facebook = substr($request->input('facebook'),25);      
        $member->instagram = substr($request->input('instagram'),26);      
        $member->twitter = substr($request->input('twitter'),20);           
        $member->save();

        return redirect()->route('team')->with('success','Team Member Created Successfully');
    }

    public function edit($id)
    {
        $member = Team::find($id);
        return view('admin.team.editMember')->with('member',$member);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'designation' => 'required|min:2'
        ]);

        $member = Team::find($id);

        if($request->hasFile('image')){
            if($member->image != 'avatar.jpg'){
                File::delete("uploads/TeamMembers/" . $member->image);
            }
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $request->file('image')->move(public_path() . '/uploads/TeamMembers', $fileNameToStore);
            $member->image = $fileNameToStore;
        }      
        
        $member->name = $request->input('name');
        $member->post = $request->input('designation');
        $member->description = $request->input('bio');       
        $member->facebook = substr($request->input('facebook'),25);      
        $member->instagram = substr($request->input('instagram'),26);      
        $member->twitter = substr($request->input('twitter'),20);          
        $member->save();

        return redirect()->route('team')->with('success','Team Member Updated Successfully');
    }

    public function destroy($id)
    {
        $member = Team::find($id);
        File::delete("uploads/TeamMembers/" . $member->image);   
        $member->delete();

        return redirect()->route('team')->with('success','Team Member Deleted Successfully');
    }

    public function memberStatus(Request $request)
    {
        $member = Team::find($request->member_id);
        $member->status = $request->status;
        $member->save();
    }
}
