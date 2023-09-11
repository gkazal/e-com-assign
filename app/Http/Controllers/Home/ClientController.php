<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Products;
use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    //

    public function CategoryPage($id)
    {
        //  ekane fisrt amra category id fetch korci, because products, category id dia fetch hobe and category name by id dia show hobe, category.blade file ar modde 
        // and seta /category/id/slug route ar modde show hoice and category id dia name category.blade file a show hoice..
        $allCategories = Category::all();
        $category = Category::findOrFail($id);
        $products = Products::where('category_id', $id)->latest()->get();
        return view('homepage.layouts.category', compact('allCategories','category','products'));

    }

    public function AllProducts()
    {
        $allCategories = Category::all();
        $allProducts = Products::all();

        return view('homepage.layouts.allproducts', compact('allCategories','allProducts'));
    }


    public function SingleProduct($id)
    {
        $allCategories = Category::all();
        $allProducts = Products::all();
        $products = Products::findOrFail($id);

        return view('homepage.layouts.singleproduct', compact('allCategories','allProducts','products'));
    }

    public function UserProfile()
    {
        //  ekane allCategories and allProducts view te compact na korale hmoetemplate page a allCategories and allproducts
        //  pabe na. karon hometemplate.blade file a userprofile yield('') kore add kora hoice..
        $allCategories = Category::all();
        $allProducts = Products::all();

        return view('homepage.layouts.userprofile', compact('allCategories','allProducts'));
    }

   

    public function UserDashboard()
    {
        $allCategories = Category::all();
        $allProducts = Products::all();
        return view('homepage.layouts.userdashboard',  compact('allCategories','allProducts'));
    }
    
    
    public function index()
    {
        $allCategories = Category::all();
        $allProducts = Products::all();

        $userid = Auth::id();
        $cart_items = Cart::where('user_id',$userid)->get();

        return view('homePage.layouts.addtocart', compact('allCategories','allProducts','cart_items','userid'));
    }

    public function AddProductToCart( Request $request)
    {
      

        $product_price = $request->price;
        $quantity = $request->product_quantity;
        $price = $product_price * $quantity;
        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->product_quantity,
            'price' => $price,

        ]);

        // cart click korle redirect hoye addtocart index page cole jabe..
        return redirect()->route('addtocart')->with('message','your item added to cart successfully');

    }

    public function RemoveCartItem($id)
    {
        Cart::destroy($id);
        return redirect()->back()->with('message','your item deleted from cart successfully');

    }

    public function ShippingAddress()
    {
        $allCategories = Category::all();
        $allProducts = Products::all();

        return view('homePage.layouts.shippingaddress',  compact('allCategories','allProducts'));

    }


    public function AddShippingAddress(Request $request)
    {

        $request -> validate([
            // 'user_id' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'postal_code' => 'required',


        ]);

      
        ShippingInfo::insert([
            'user_id' => Auth::id(),
            'phone' => $request->phone,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
        ]);


        
        return redirect()->route('checkout');
        
    }

    public function Checkout()
    {
        $allCategories = Category::all();
        $allProducts = Products::all();

        $userid = Auth::id();
        // userid dia Cart model ar info gulo fetch korlam.. karon agulo amra checkout page show korabo
        $cart_items = Cart::where('user_id',$userid)->get();

        // userid dia shipping model ar info gulo fetch korlam sudhu specific ai user ar jonno..karon agulo amra checkout page show korabo
        $shipping_address = ShippingInfo::where('user_id',$userid)->first();


        return view('homePage.layouts.checkout',  compact('allCategories','allProducts', 'cart_items','shipping_address'));

    }

    public function PlaceOrder()
    {

        $userid = Auth::id();
        $cart_items = Cart::where('user_id',$userid)->get();
        $shipping_address = ShippingInfo::where('user_id',$userid)->first();

        // cart item multiple hote pare tai for each loop dia show korbo...

        foreach($cart_items as $item)
        {
            Order::insert([
                'userid' => $userid,
                'shipping_phoneNumber' => $shipping_address->phone,
                'shipping_address' => $shipping_address->address,
                'shipping_postalcode' => $shipping_address->postal_code,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_price' => $item->price,

                

            ]);

            // order place hobar por amrra cart ar info ta cart database theke delete kore dicci..
            $id = $item->id;
            Cart::findOrFail($id)->delete();
        }

        // order place korar sate sate shipping info database theke delete kore debo ai specific id ar user ar data
        // karon ai order ar info and address sob order table cole jabe...
        ShippingInfo::where('user_id',$userid)->first()->delete();


        return redirect()->route('pendingorders')->with('message','your order placed successfully');
        

    }

    public function PendingOrders()
    {
        $allCategories = Category::all();
        $allProducts = Products::all();
        $userid = Auth::id();

        // sudu matro pending order gulo k show korbe specific user ar jonno..
        $pending_orders = Order::where('status', 'pending')->where('userid', $userid)->latest()->get();

        return view('homepage.layouts.pendingorders',  compact('allCategories','allProducts','pending_orders','userid'));
    }


} 
