<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    //
    public function index()
    {
        $allProducts = Products::all();
        $allCategories = Category::all();
        // return view('userprofile', compact('allProducts'));
        // return view('frontend.homepage', compact('allProducts','allCategories'));
        return view('homepage.layouts.allproducts',  compact('allProducts','allCategories'));


    }


    // category k hometemplate page a dekhanor jonno homepagecontroller ar modde Categories function dia view koraice 
    public function Categories()
    {
        $allCategories = Category::all();

        return view('homePage.layouts.hometemplate', compact('allCategories'));

    }

    public function AllProducts(Category $category)
    {
        $products = $category->products; 
        return view('frontend.homepage', compact('products'));

    }




}
