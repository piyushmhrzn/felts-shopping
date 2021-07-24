<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.settings')->with('setting',$setting);
    }

    public function companySetting()
    {
        $setting = Setting::first();
        return view('admin.settings.settings-name')->with('setting',$setting);
    }

    public function storeCompanySetting(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required|min:3|max:64',
        ]);

        $setting = new Setting;
        $setting->company_name = $request->input('company_name');
        $setting->meta_description = $request->input('meta_description');
        $setting->save();

        return redirect()->route('settings')->with('success','Company Setting Set Successfully!');
    }

    public function updateCompanySetting(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required|min:3|max:64',
        ]);

        $setting = Setting::first();
        $setting->company_name = $request->input('company_name');
        $setting->meta_description = $request->input('meta_description');
        $setting->save();

        return redirect()->route('settings')->with('success','Company Setting Updated Successfully!');
    }

    //Company Information
    public function companyInformation()
    {
        $companyInfo = Setting::first();
        return view('admin.settings.settings-information')->with('companyInfo',$companyInfo);
    }

    //Company Information Update
    public function updateCompanyInformation(Request $request)
    {
        $this->validate($request, [
            'primary_email' => 'required|email',
            'primary_phone' => 'required|numeric|digits_between:7,12',
        ]);

        $companyInfo = Setting::first();
        $companyInfo->primary_email = $request->input('primary_email');
        $companyInfo->secondary_email = $request->input('secondary_email');
        $companyInfo->primary_phone = $request->input('primary_phone');
        $companyInfo->secondary_phone = $request->input('secondary_phone');
        $companyInfo->street = $request->input('street');
        $companyInfo->city = $request->input('city');
        $companyInfo->country = $request->input('country');
        $companyInfo->save();

        return redirect()->route('settings')->with('success','Company Infromation Updated Successfully!');
    }

    //Company Images
    public function companyImages()
    {
        $setting = Setting::first();
        return view('admin.settings.settings-images')->with('setting',$setting);
    }

    //Company Images Updates
    public function updateCompanyImages(Request $request)
    {
        $companyImages = Setting::first();

        if($request->hasFile('favicon')){
            File::delete("uploads/Settings/Favicon/" . $companyImages->favicon);
            $fileNameWithExt = $request->file('favicon')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('favicon')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $request->file('favicon')->move(public_path() . '/uploads/Settings/Favicon', $fileNameToStore);
            $companyImages->favicon = $fileNameToStore;
        }

        if($request->hasFile('logo')){
            File::delete("uploads/Settings/Logo/" . $companyImages->logo);
            $fileNameWithExt = $request->file('logo')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $request->file('logo')->move(public_path() . '/uploads/Settings/Logo', $fileNameToStore);
            $companyImages->logo = $fileNameToStore;
        } 

        $companyImages->save();

        return redirect()->route('settings')->with('success','Company Images Updated Successfully!');
    }

    //Homepage First Banner Section
    public function updateFirstBanner(Request $request)
    {
        $firstBanner = Setting::first();

        if($request->hasFile('homepage_banner1')){
            if($firstBanner->homepage_banner1 != 'homepage_banner1.jpg'){
                File::delete("uploads/Settings/FirstBanner/" . $firstBanner->homepage_banner1);
            }
            $fileNameWithExt = $request->file('homepage_banner1')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('homepage_banner1')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $request->file('homepage_banner1')->move(public_path() . '/uploads/Settings/FirstBanner', $fileNameToStore);
            $firstBanner->homepage_banner1 = $fileNameToStore;
        }

        $firstBanner->main_heading1 = $request->input('main_heading1');
        $firstBanner->sub_heading1 = $request->input('sub_heading1');
        $firstBanner->save();

        return redirect()->route('settings')->with('success','First Banner Section Updated Successfully!');
    }

    //Homepage Second Banner Section
    public function updateSecondBanner(Request $request)
    {
        $secondBanner = Setting::first();

        if($request->hasFile('homepage_banner2')){
            if($secondBanner->homepage_banner2 != 'homepage_banner2.jpg'){
                File::delete("uploads/Settings/SecondBanner/" . $secondBanner->homepage_banner2);
            }
            $fileNameWithExt = $request->file('homepage_banner2')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('homepage_banner2')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $request->file('homepage_banner2')->move(public_path() . '/uploads/Settings/SecondBanner', $fileNameToStore);
            $secondBanner->homepage_banner2 = $fileNameToStore;
        }

        $secondBanner->main_heading2 = $request->input('main_heading2');
        $secondBanner->sub_heading2 = $request->input('sub_heading2');
        $secondBanner->title2 = $request->input('title2');
        $secondBanner->description2 = $request->input('description2');
        $secondBanner->save();

        return redirect()->route('settings')->with('success','Second Banner Section Updated Successfully!');
    }
    

    //Company Social Medias
    public function companySocialMedia()
    {
        $companySocial = Setting::first();
        return view('admin.settings.settings-social')->with('companySocial',$companySocial);
    }

    public function updateCompanySocialMedia(Request $request)
    {
        $companySocial = Setting::first();
        $companySocial->facebook = substr($request->input('facebook'),25);
        $companySocial->instagram = substr($request->input('instagram'),26);
        $companySocial->twitter = substr($request->input('twitter'),20);
        $companySocial->youtube = substr($request->input('youtube'),20);
        $companySocial->save();

        return redirect()->route('settings')->with('success','Company Social Media Sites Updated Successfully!');
    }
}
