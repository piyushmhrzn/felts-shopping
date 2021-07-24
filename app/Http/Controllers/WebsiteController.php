<?php

namespace App\Http\Controllers;

use App\Mail\NewUser;
use App\Models\AboutUs;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Subscriber;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $featuredProducts = Product::where('status',1)->get();  
        $newProducts = Product::orderBy('created_at','desc')->where('status',1)->take(8)->get();
        $popularProducts = Product::orderBy('order','asc')->where('status',1)->take(8)->get();
        return view('website.index')
            ->with('featuredProducts',$featuredProducts)
            ->with('newProducts',$newProducts)
            ->with('popularProducts',$popularProducts);
    }

    public function singleProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $products = Product::where('status',1)->get()->random(4);
        return view('website.single-product')
                ->with('product',$product)
                ->with('products',$products);
    }

    public function shop()
    {
        $products = Product::orderBy('order','asc')->where('status',1)->get();  
        return view('website.shop')->with('products',$products);
    }

    public function about()
    {
        $about = AboutUs::first();
        $members = Team::where('status',1)->get();
        return view('website.about')
                ->with('about',$about)
                ->with('members',$members);
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function productList()
    {
        return view('website.product-list');
    }

    public function productGrid()
    {
        return view('website.product-grid');
    }

    public function myCart()
    {
        return view('website.users.cart');
    }

    public function myCheckout()
    {
        return view('website.users.checkout');
    }

    public function myOrder()
    {
        return view('website.users.order-complete');
    }

    public function myWishlist()
    {
        return view('website.users.wishlist');
    }

    //////////////////////////////////////////////////////////////////////////////////////////////
    /********************************************************************************************/
    //////////////////////////////////////////////////////////////////////////////////////////////

    public function storeContactMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:7,12',
            'subject' => 'required|min:3',
            'message' => 'required|min:5'
        ]);

        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email'); 
        $contact->subject = $request->input('subject'); 
        $contact->message = $request->input('message'); 
        $contact->save();
    }

    //Email Subscription
    public function emailSubscription(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email|unique:subscribers,email'
        ]);

        $subscriber = new Subscriber;
        $subscriber->email = $request->input('email');
        $subscriber->save();
    }

    public function unsubscribe($id)
    {
        $subscriber = Subscriber::find($id);
        $subscriber->status = 0;
        $subscriber->save();

        return view('admin.contacts.subscribers.unsubscribe');
    }

    //------------------------------------------------------------
    //------------------ User Login/Register ---------------------
    //------------------------------------------------------------
     
    public function userLogin()
    {
        return view('website.users.login');
    }

    public function userRegister(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:2',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|numeric|digits_between:7,12',
            'password'=>'required|confirmed|min:6'
        ]);

        $user = new User;
        $user->type = 2;
        $user->first_name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password=bcrypt($request->input('password'));       

        if($request->has('subscription')){
            $subscriber = new Subscriber;
            $subscriber->email = $request->input('email');
            $subscriber->save();
        }
        $user->save();
        Mail::to($user)->send(new NewUser($user));       
    }

    //------------------------------------------------------------
    //------------------- User Verification ----------------------
    //------------------------------------------------------------
    public function verifyUser(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);       

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->route('my-account')->with('login-success','Login Successful');
        }else{
            return redirect()->route('user-login')->with('login-error','Wrong Username or Password');
        }
    }

    //------------------------------------------------------------
    //---------------------- View Profile ------------------------
    //------------------------------------------------------------

    public function myAccount()
    {
        return view('website.users.my-account');
    }

    //Update Personal Information
    public function updateUserInformation(Request $request)
    {        
        $this->validate($request,[
            'phone'=>'required|numeric|digits_between:7,12',
            'name'=>'required'
        ]);
        $user = User::find(Auth::user()->id);

        $user->first_name = $request->input('name');
        $user->age = $request->input('age');
        $user->address = $request->input('address');         
        $user->city = $request->input('city');         
        $user->country = $request->input('country');         
        $user->phone = $request->input('phone');         
        $user->save();
               
        return redirect()->route('my-account')->with('login-success','Personal Information Updated Successfully');
    }

    //Update Password
    public function updateUserPassword(Request $request)
    {
        $this->validate($request,[
            'old_password'=>'required',
            'password' => 'required|confirmed|min:4|max:32'
        ]);

        $user = User::find(Auth::user()->id);
        
        if(Hash::check($request->input('old_password'), $user->password)){
            $user->password=bcrypt($request->input('password'));         
            $user->save();

            return redirect()->route('my-account')->with('login-success','Password Updated Successfully');
        }
        else{
            return redirect()->route('my-account')->with('login-error','Incorrect Current Password');
        }
        
               
    }

    // public function updateProfilePicture(Request $request)
    // {
    //     $this->validate($request,[
    //         'image'=>'required'
    //     ]);

    //     $user = User::find(Auth::user()->id);

    //     if($request->hasFile('image')){
    //         if($user->image != null){
    //             File::delete("uploads/Users/" . $user->image);
    //         }
    //         $fileNameWithExt = $request->file('image')->getClientOriginalName();
    //         $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    //         $extension = $request->file('image')->getClientOriginalExtension();
    //         $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
    //         $request->file('image')->move(public_path() . '/uploads/Users', $fileNameToStore);
    //         $user->image=$fileNameToStore;
    //     }
         
    //     $user->save();
               
    //     return redirect()->route('userProfile')->with('success','Profile Picture Updated Successfully');
    // }

    // public function deleteProfilePicture()
    // {
    //     $user = User::find(Auth::user()->id);
    //     File::delete("uploads/Users/" . $user->image);
    //     $user->image->delete();
               
    //     return redirect()->route('userProfile')->with('success','Profile Picture Deleted Successfully');
    // }

    public function userCart()
    {
        return view('website.users.cart');
    }

    //------------------------------------------------------------
    //---------------------- User Logout -------------------------
    //------------------------------------------------------------
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

}
