<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //

    public function index ()
    {
        $productList = Products::all();

        return view('admin.product.index',compact('productList'));

    }

    public function create ()
    {
        $categories = Category::all();

        return view('admin.product.create',compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $validate = Validator::make(request()->all(), [
                'category_id' => 'required',
                'name'     => 'required',
                'description'     => 'required',
                'price'     => 'required',
                'image'    => 'required|mimes:png,jpg,jpeg',
                'status'   => Rule::in(['active', 'inactive']),
            ]);

            if ($validate->fails()) {
                return redirect('admin/product/create')
                    ->withInput()
                    ->withErrors($validate);
            }

            $imagename = '';
            if($image = $request->file('image')){
                $imagename = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
                // image move to products foler..
                $image->move('images/products', $imagename);
            }

            $target                 = new Products();
            $target->category_id    = $request->category_id;
            $target->name           = $request->name;
            $target->description    = $request->description;
            $target->price          = $request->price;
            $target->image          = $imagename ?? '';
            $target->status         = $request->status;
           
            if ($target->save()) {
                Session::flash('success', "Product Created Successfully!");
                return redirect('admin/product');
            } else {
                Session::flash('error', "Product Create Unuccessfull!");
                return redirect('admin/product/create');
            }

        } catch (\Throwable $th) {
            return response([
                'status'  => 'server_error',
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request, $id)
    {
        $categories = Category::all();
        $productsdata = Products::find($id);

        return view('admin.product.edit')->with(compact('categories','productsdata'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validate = Validator::make(request()->all(), [
                'category_id' => 'required',
                'name'     => 'required',
                'description'     => 'required',
                'price'     => 'required',
                'image'    => 'required|mimes:png,jpg,jpeg',
                'status'   => Rule::in(['active', 'inactive']),
            ]);

            // if ($validate->fails()) {
            //     return redirect('admin/product/edit')
            //         ->withInput()
            //         ->withErrors($validate);
            // }

             if ($request->file('image')) {
                    $image     = $request->file('image');
                    $imageName = time() . '.' . $image->getClientOriginalName();
                    $image->move(public_path('/images/products'), $imageName);
                }
    

            $target                 = Products::where('id', $request->id)->first();
            $target->category_id      = $request->category_id ?? $target->category_id;
            $target->name           = $request->name ?? $target->name;
            $target->description           = $request->description ?? $target->description;
            $target->price           = $request->price ?? $target->price;
            $target->image            = $imageName ?? $target->image;
            $target->status         = $request->status ?? $target->status;

            
            if ($target->update()) {
                Session::flash('success', "Product update Successfully!");
                return redirect('admin/product');
            } else {
                Session::flash('error', "Prodcut Update Unuccessfull!");
                return redirect('admin/product/edit');            
            }

        } catch (\Throwable $th) {
            return response([
                'status'  => 'server_error',
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
       
        Products::destroy($id);
        return redirect()->back();
    }



}
