<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\AboutUsGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first();
        return view('admin.aboutUs.aboutUs')->with('aboutUs',$aboutUs);
    }

    //Create First Content
    public function storeAboutUs(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:64',
            'short_description' => 'required|min:10'
        ]);
        
        $aboutUs = new AboutUs;
        $aboutUs->title=$request->input('title');
        $aboutUs->short_description=$request->input('short_description');
        $aboutUs->long_description=$request->input('long_description');
        $aboutUs->save();

        return redirect()->route('aboutUs')->with('success','Content Added Successfully!');
    }

    //Update Main Content
    public function updateAboutUs(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:64',
            'short_description' => 'required|min:10'
        ]);
        
        $aboutUs = AboutUs::first();
        $aboutUs->title=$request->input('title');
        $aboutUs->short_description=$request->input('short_description');
        $aboutUs->long_description=$request->input('long_description');
        $aboutUs->save();

        return redirect()->route('aboutUs')->with('success','Content Updated Successfully!');
    }

    //Upload About Us Image Gallery
    public function aboutUsGallery(Request $request)
    {
        $this->validate($request, [
            'image' => 'required'
        ]);

        $aboutUs = AboutUs::first();
        if($request->hasFile('image')){
            foreach($request->file('image') as $image){
                $fileNameWithExt = $image->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                $image->move(public_path() . '/uploads/AboutUs/AboutUsGallery', $fileNameToStore);  
                
                $aboutUsGallery = new AboutUsGallery;
                $aboutUsGallery->title = $fileNameToStore;
                $aboutUsGallery->image = $fileNameToStore;              
                $aboutUsGallery->about_us_id = $aboutUs->id;
                $aboutUsGallery->save();
            }
        }
        return redirect()->route('aboutUs')->with('success','Images Added Successfully');
    }

    //Edit About Us Image Name
    public function updateImageName(Request $request, $image_id)
    {
        $aboutUsGallery = AboutUsGallery::find($image_id);
        $aboutUsGallery->title = $request->input('imageName');
        $aboutUsGallery->save();

        return redirect()->route('aboutUs')->with('success','Image Title Updated Successfully');
    }

    //Delete Image
    public function deleteImage($id)
    {
        $aboutUsGallery = AboutUsGallery::find($id);
        File::delete("uploads/AboutUs/AboutUsGallery/" . $aboutUsGallery->image);
        $aboutUsGallery->delete();

        return redirect()->route('aboutUs')->with('success','Image Deleted Successfully');
    }

    public function aboutUsImageStatus(Request $request)
    {
        $aboutGallery = AboutUsGallery::find($request->image_id);
        $aboutGallery->status = $request->status;
        $aboutGallery->save();
    }
}
