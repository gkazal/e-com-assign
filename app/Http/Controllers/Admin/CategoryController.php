<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    //

    public function index ()
    {
        $categoryList = Category::all();
        return view('admin.category.index', compact('categoryList'));
    }

    public function create ()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        try {
            $validate = Validator::make(request()->all(), ([
                'category_name'     => 'required',              
                'status' => Rule::in(['active', 'inactive']),         
            ]));

            if ($validate->fails()) {
                return redirect('admin/category/create')
                    ->withInput()
                    ->withErrors($validate);
            }
    
            $target                 = new Category();
            $target->category_name  = $request->category_name;
            $target->status         = $request->status;
    
            if ($target->save()) {
                Session::flash('success', "Category Created Successfully!");
                return redirect('admin/category');
            } else {
                Session::flash('error', "Category Create Unuccessfull!");
                return redirect()->back();            
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
        $target = Category::where('id', $id)->first();
        return view('admin.category.edit')->with(compact('target'));
    }

    public function update(Request $request, $id)
    {

        try {
            $validate = Validator::make(request()->all(), ([

                'category_name'     => 'required',               
                'status' => Rule::in(['active', 'inactive']),
                
            ]));

            if ($validate->fails()) {
                return redirect('admin/category/edit')
                    ->withInput()
                    ->withErrors($validate);
            }
    
            $target                 = Category::where('id', $request->id)->first();
            $target->category_name  = $request->category_name ?? $target->category_name;         
            $target->status         = $request->status ?? $target->status;
    
            if ($target->update()) {
                Session::flash('success', "Category update Successfully!");
                return redirect('admin/category');
            } else {
                Session::flash('error', "Category Update Unuccessfull!");
                return redirect('admin/category/edit');            
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
        Category::destroy($id);
        Session::flash('success','Category delete successfully');

        return redirect()->back();
    }



}
