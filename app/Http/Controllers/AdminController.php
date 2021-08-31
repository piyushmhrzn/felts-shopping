<?php

namespace App\Http\Controllers;

use App\Mail\ChangeEmail;
use App\Mail\ChangePassword;
use App\Mail\ForgotPassword;
use App\Mail\NewAdmin;
use App\Models\Contact;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    //------------------------------------------------------------
    //------------------Admin Login-------------------------------
    //------------------------------------------------------------
    public function adminLogin()
    {
        return view('admin.adminLogin');
    }

    public function verifyAdmin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);       

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->route('dashboard')->with('success',$request->input('name').'Login Successful');
        }else{
            return redirect('/adminLogin')->with('error','Wrong Username or Password');
        }
    }

    //------------------------------------------------------------
    //--------------------Forgot Password-------------------------
    //------------------------------------------------------------
    public function forgotPassword()
    {
        return view('admin.forgotPassword.forgotPassword');
    }

    public function passwordResetMail(Request $request)
    {
        $admin = User::where('email',$request->input('email'))->first();

        if($admin){
            Mail::to($admin)->send(new ForgotPassword($admin));
            return view('admin.forgotPassword.successResetMail');
        }
        else{
            return redirect()->route('forgotPassword')->with('error','The Email entered is not associated with us.');
        }
    }

    public function resetForgotPassword($id){
        return view('admin.forgotPassword.resetForgotPassword')->with('id',$id);
    }

    public function resetPassword(Request $request, $id)
    {
        $admin = User::find($id);

        $this->validate($request,[
            'password' => 'required|confirmed|min:5|max:25'
        ]);

        $admin->password=bcrypt($request->input('password'));
        $admin->save();

        return view('admin.forgotPassword.successResetPassword');
    }

    //------------------------------------------------------------
    //--------------------------Dashboard-------------------------
    //------------------------------------------------------------
    public function index()
    {
        //Notifications
        $notifications = count(Contact::where('status',1)->get());
        session()->put('notifications',$notifications);

        $users = User::where('type',2)->get();
        $user = User::where('type',2)->orderBy('created_at', 'desc')->first();        
        $products = Product::get();
        return view('admin.dashboard')
                ->with('users',$users)
                ->with('user',$user)
                ->with('products',$products);
    }

    //------------------------------------------------------------
    //--------------------Admin Profile---------------------------
    //------------------------------------------------------------
    public function adminProfile()
    {
        //Notifications
        $notifications = count(Contact::where('status',1)->get());
        session()->put('notifications',$notifications);

        return view('admin.adminProfile.profile');
    }

    public function updateAdminProfile(Request $request)
    {
        $this->validate($request,[
            'first_name'=>'required|min:2',
            'last_name'=>'required|min:2'
        ]);

        $profile = User::find(Auth::user()->id);        
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->address = $request->input('address'); 
        $profile->city = $request->input('city'); 
        $profile->country = $request->input('country'); 
        $profile->phone = $request->input('phone');
        $profile->description = $request->input('notes');    
        $profile->save();
               
        return redirect()->route('adminProfile')->with('success','Profile Updated Successfully');
    }

    public function changeAdminImage(Request $request)
    {
        $profile = User::find(Auth::user()->id);

        if($request->hasFile('image')){
            if($profile->image != 'noimage.jpg'){
                File::delete("uploads/Admin/" . $profile->image);
            }
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $request->file('image')->move(public_path() . '/uploads/Admin', $fileNameToStore);
            $profile->image = $fileNameToStore;
        }
        $profile->save();
               
        return redirect()->route('adminProfile')->with('success','Profile Picture Updated Successfully');
    }

    //----------------------------------------------------
    //------------------Admin Password--------------------
    //----------------------------------------------------
    public function enterPassword()
    {
        return view('admin.adminProfile.enterPassword');
    }

    public function checkPassword(Request $request)
    {
        $this->validate($request,[
            'old_password' => 'required'
        ]);
        
        $admin = User::find(Auth::user()->id);
        
        if(Hash::check($request->input('old_password'), $admin->password)){
            $otp = Str::random(6);
            $admin->remember_token = $otp;
            $admin->save();

            Mail::to($admin)->send(new ChangePassword($admin));
        }
        else{
            return redirect()->route('adminProfile.enterPassword')->with('error','Enter correct password');
        }
        return redirect(URL::signedRoute('adminProfile.enterOTP'));
    }
    
    public function enterOTP()
    {
        return view('admin.adminProfile.enterOTP');
    }

    public function checkOTP(Request $request)
    {
        $this->validate($request,[
            'otp' => 'required'
        ]);

        if($request->input('otp') != Auth::user()->remember_token){
            return redirect()->route('adminProfile.enterOTP')->with('error','Invalid Code');
        }else{
            if((Carbon::now()->subMinutes(5)) <= (Auth::user()->updated_at->timezone(Auth::user()->timezone))){
                return redirect(URL::signedRoute('adminProfile.changePassword'));
            }else{
                return redirect()->route('adminProfile.enterOTP')->with('error','Your code has expired');
            }         
        }
    }

    public function changePassword()
    {
        return view('admin.adminProfile.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'password' => 'required|confirmed|min:4|max:32'
        ]);
        
        $admin = User::find(Auth::user()->id);
        $admin->password=bcrypt($request->input('password'));
        $admin->save();

        // Auth::logout();
        return redirect()->route('adminProfile')->with('success','Password Updated Successfully');
    }

    public function resendOTP()
    {
        $admin = User::find(Auth::user()->id);     
        $otp = Str::random(6);
        $admin->remember_token = $otp;
        $admin->save();

        Mail::to($admin)->send(new ChangePassword($admin));

        return redirect()->route('enterOTP');
    }

    //------------------------------------------------------------
    //----------------------Super Admin---------------------------
    //------------------------------------------------------------
    public function superAdmin()
    {
        //Notifications
        $notifications = count(Contact::where('status',1)->get());
        session()->put('notifications',$notifications);
        
        if(Auth::user()->type == 0){
            $admins = User::get();
            return view('admin.superAdmin.superAdmin')->with('admins',$admins);
        }
        abort(404);
    }

    public function addAdmin()
    {
        return view('admin.superAdmin.addAdmin');
    }

    public function storeAdmin(Request $request)
    {
        $this->validate($request,[
            'first_name'=>'required|min:2',
            'last_name'=>'required|min:2',
            'email'=>'email|required|unique:users,email'
        ]);

        $admin = new User;
        $admin->first_name = $request->input('first_name');
        $admin->last_name = $request->input('last_name');
        $admin->type = $request->input('type');
        $admin->email = $request->input('email');
        $admin->image = 'noimage.jpg';
        
        $password = Str::random(6);
        $admin->password = bcrypt($password);
        
        if($admin->save()){
            Mail::to($admin)->send(new NewAdmin($admin,$password));
            return redirect()->route('superAdmin')->with('success', 'Admin Registered successfully');
        }
    }

    public function editAdmin($id)
    {
        if(Auth::user()->id != $id){
            $admin = User::find($id);
            return view('admin.superAdmin.editAdmin')->with('admin',$admin);
        } 
        abort(404);     
    }

    public function updateAdmin(Request $request, $id)
    {
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'email|required'
        ]);

        $admin = User::find($id);
        $admin->first_name = $request->input('first_name');
        $admin->last_name = $request->input('last_name');
        $admin->type = $request->input('type');   
        
        if($admin->email != $request->input('email')){
            $admin->email = $request->input('email');

            $password = Str::random(6);
            $admin->password = bcrypt($password);
            $admin->save();

            Mail::to($admin)->send(new ChangeEmail($admin,$password));
        }else{
            $admin->save();
        }

        return redirect()->route('superAdmin')->with('success','Admin Updated Successfully');
    }

    public function deleteAdmin($id)
    {
        $admin = User::find($id);
        if($admin->image != 'noimage.jpg'){
            File::delete("uploads/Admin/" . $admin->image);
        }
        $admin->delete();

        return redirect()->route('superAdmin')->with('success','Admin Deleted Successfully');
    }

    //------------------------------------------------------------
    //--------------------------Logout----------------------------
    //------------------------------------------------------------
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
