<?php

namespace App\Http\Controllers;

use App\Mail\NewUser;
use App\Models\AboutUs;
use App\Models\Cart;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Subscriber;
use App\Models\Team;
use App\Models\User;
use App\Models\Wishlist;
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
        $featuredProducts = Product::where('status', 1)->get();
        $newProducts = Product::orderBy('created_at', 'desc')->where('status', 1)->take(8)->get();
        $popularProducts = Product::orderBy('order', 'asc')->where('status', 1)->take(8)->get();
        return view('website.index')
            ->with('featuredProducts', $featuredProducts)
            ->with('newProducts', $newProducts)
            ->with('popularProducts', $popularProducts);
    }

    public function singleProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $products = Product::where('status', 1)->get()->random(4);
        return view('website.single-product')
            ->with('product', $product)
            ->with('products', $products);
    }

    public function shop()
    {
        $products = Product::orderBy('order', 'asc')->where('status', 1)->get();
        return view('website.shop')->with('products', $products);
    }

    public function ourProducts()
    {
        $products = Product::orderBy('order', 'asc')->where('status', 1)->get();
        return view('website.products')->with('products', $products);
    }

    public function about()
    {
        $about = AboutUs::first();
        $members = Team::where('status', 1)->get();

        return view('website.about')
            ->with('about', $about)
            ->with('members', $members);
    }

    public function contact()
    {
        return view('website.contact');
    }

    //------------------------------------------------------------
    //----------------- User Whislist Section --------------------
    //------------------------------------------------------------

    public function myWishlist()
    {
        $user = User::find(Auth::user()->id);
        $items = Wishlist::where('user_id', $user->id)->first();

        if ($items != null) {
            $wishlistItems = Wishlist::where('user_id', $user->id)->get();
        } else {
            $wishlistItems = null;
        }

        return view('website.users.wishlist')->with('wishlistItems', $wishlistItems);
    }

    public function addToWishlist($id)
    {
        $product = Product::find($id);
        $user = User::find(Auth::user()->id);

        $wishlist = new Wishlist;
        $wishlist->user_id = $user->id;
        $wishlist->image = $product->image;
        $wishlist->title = $product->title;
        $wishlist->price = $product->price;
        $wishlist->availability = $product->availability;

        if ($wishlist->save()) {
            return redirect()->route('my-wishlist')->with('login-success', 'Item has been successfully added to your wishlist');
        }
    }

    public function deleteWishlistItem($id)
    {
        $wishlist = Wishlist::find($id);

        if ($wishlist->delete()) {
            return redirect()->route('my-wishlist')->with('login-success', 'Item has been successfully removed from your wishlist');
        }
    }

    //------------------------------------------------------------
    //------------------- User Cart Section ----------------------
    //------------------------------------------------------------

    public function myCart()
    {
        $user = User::find(Auth::user()->id);
        $items = Cart::where('user_id', $user->id)->first();

        if ($items != null) {
            $cartItems = Cart::where('user_id', $user->id)->get();
        } else {
            $cartItems = null;
        }

        return view('website.users.cart')->with('cartItems', $cartItems);
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        $user = User::find(Auth::user()->id);

        $cart = new Cart;
        $cart->user_id = $user->id;
        $cart->image = $product->image;
        $cart->title = $product->title;
        $cart->price = $product->price;

        if ($cart->save()) {
            return redirect()->route('my-cart')->with('login-success', 'Item has been successfully added to your cart');
        }
    }

    public function deleteCartItem($id)
    {
        $cart = Cart::find($id);

        if ($cart->delete()) {
            return redirect()->route('my-cart')->with('login-success', 'Item has been successfully removed from your cart');
        }
    }

    public function addToCartFromWishlist($id)
    {
        $product = Wishlist::find($id);
        $user = User::find(Auth::user()->id);

        $cart = new Cart;
        $cart->user_id = $user->id;
        $cart->image = $product->image;
        $cart->title = $product->title;
        $cart->price = $product->price;
    
        if ($cart->save() && $product->delete()) {
            return redirect()->route('my-cart')->with('login-success', 'Item has been successfully added to your cart');
        }
    }

    //------------------------------------------------------------
    //----------------- User Checkout Section --------------------
    //------------------------------------------------------------
    public function myCheckout()
    {
        $user = User::find(Auth::user()->id);
        $items = Cart::where('user_id', $user->id)->first();

        if ($items != null) {
            $cartItems = Cart::where('user_id', $user->id)->get();
        } else {
            $cartItems = null;
        }

        return view('website.users.checkout')->with('cartItems',$cartItems);
    }

    //------------------------------------------------------------
    //--------------------- Order Complete -----------------------
    //------------------------------------------------------------

    public function orderComplete()
    {
        $user = User::find(Auth::user()->id);
        $items = Cart::where('user_id', $user->id)->first();

        if ($items != null) {
            $cartItems = Cart::where('user_id', $user->id)->get();
        } else {
            $cartItems = null;
        }

        return view('website.users.order-complete')->with('cartItems',$cartItems);
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
        $this->validate($request, [
            'email' => 'required|email|unique:subscribers,email'
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
        $this->validate($request, [
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|digits_between:7,12',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = new User;
        $user->type = 2;
        $user->first_name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = bcrypt($request->input('password'));

        if ($request->has('subscription')) {
            $subscriber = new Subscriber;
            $subscriber->email = $request->input('email');
            $subscriber->save();
        }
        $user->save();
        // Mail::to($user)->send(new NewUser($user));       
    }

    //------------------------------------------------------------
    //------------------- User Verification ----------------------
    //------------------------------------------------------------
    public function verifyUser(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('my-account')->with('login-success', 'Login Successful');
        } else {
            return redirect()->route('user-login')->with('login-error', 'Wrong Username or Password');
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
        $this->validate($request, [
            'phone' => 'required|numeric|digits_between:7,12',
            'name' => 'required'
        ]);
        $user = User::find(Auth::user()->id);

        $user->first_name = $request->input('name');
        $user->age = $request->input('age');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->phone = $request->input('phone');
        $user->save();

        return redirect()->route('my-account')->with('login-success', 'Personal Information Updated Successfully');
    }

    //Update Password
    public function updateUserPassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:4|max:32'
        ]);

        $user = User::find(Auth::user()->id);

        if (Hash::check($request->input('old_password'), $user->password)) {
            $user->password = bcrypt($request->input('password'));
            $user->save();

            return redirect()->route('my-account')->with('login-success', 'Password Updated Successfully');
        } else {
            return redirect()->route('my-account')->with('login-error', 'Incorrect Current Password');
        }
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
