<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('order','desc')->paginate(12);
        return view('admin.partners.partners')->with('partners',$partners);
    }

    public function create()
    {
        return view('admin.partners.addPartner');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'address' => 'required|min:2',
            'image' => 'required'
        ]);

        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $request->file('image')->move(public_path() . '/uploads/Partners', $fileNameToStore);
        
        $partner = new Partner;
        $partner->name = $request->input('name');
        $partner->address = $request->input('address');
        $partner->image = $fileNameToStore;
        $partner->order = (Partner::count()) + 1;
        $partner->save();

        return redirect()->route('partners')->with('success','Partner Added Successfully');
    }

    public function edit($id)
    {
        $partner = Partner::find($id);
        return view('admin.partners.editPartner')->with('partner',$partner);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'address' => 'required|min:2',
        ]);

        $partner = Partner::find($id);

        if($request->hasFile('image')){
            File::delete("uploads/Partners/" . $partner->image);
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $request->file('image')->move(public_path() . '/uploads/Partners', $fileNameToStore);
            $partner->image = $fileNameToStore;
        }      
        
        $partner->name = $request->input('name');
        $partner->address = $request->input('address');       
        $partner->save();

        return redirect()->route('partners')->with('success','Partner Updated Successfully');
    }

    public function destroy($id)
    {
        $partner = Partner::find($id);
        File::delete("uploads/Partners/" . $partner->image);   
        $partner->delete();

        return redirect()->route('partners')->with('success','Partner Deleted Successfully');
    }

    public function partnerStatus(Request $request)
    {
        $partner = Partner::find($request->partner_id);
        $partner->status = $request->status;
        $partner->save();
    }

}
