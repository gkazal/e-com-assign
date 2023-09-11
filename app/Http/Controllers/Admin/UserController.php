<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    //
    public function index ()
    {
        // $userList = User::where('user_type', 'admin')->get();
        
        $userList = User::all();
        return view('admin.user.index')->with(compact('userList'));
    }

    public function create ()
    {

        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        try {
            $validate = Validator::make(request()->all(), ([

                'user_type' => Rule::in(['admin', 'user']),
                'name'     => 'required',
                'phone'    => 'required',
                'email'    => 'required|unique:users|email',
                'password' => 'min:6|required',
                'status' => Rule::in(['active', 'inactive']),
                'address' => 'required',
                
            ]));

            if ($validate->fails()) {
                return redirect('admin/user/create')
                    ->withInput()
                    ->withErrors($validate);
            }
    
            $target                 = new User();
            $target->user_type      = $request->user_type;
            $target->name           = $request->name;
            $target->phone          = $request->phone;
            $target->email          = $request->email;
            $target->password       = Hash::make($request->password);
            $target->status         = $request->status;
            $target->address        = $request->address;
    
            if ($target->save()) {
                Session::flash('success', "User Created Successfully!");
                return redirect('admin/user');
            } else {
                Session::flash('error', "User Create Unuccessfull!");
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
        $target = User::where('id', $id)->first();
        // $target = User::all();

        return view('admin.user.edit')->with(compact('target'));
    }

    public function update(Request $request, $id)
    {

        try {
            $validate = Validator::make(request()->all(), ([

                'user_type' => Rule::in(['admin', 'user']),
                'name'     => 'required',
                'phone'    => 'required',
                'email'  => 'required|email:rfc,dns|unique:users,id,' . $request->id,
                'status' => Rule::in(['active', 'inactive']),
                'address' => 'required',
                
            ]));

            if ($validate->fails()) {
                return redirect('admin/user/edit')
                    ->withInput()
                    ->withErrors($validate);
            }
    
            $target                 = User::where('id', $request->id)->first();
            $target->user_type      = $request->user_type ?? $target->user_type;
            $target->name           = $request->name ?? $target->name;
            $target->phone          = $request->phone ?? $target->phone;
            $target->email          = $request->email ?? $target->email;
            $target->status         = $request->status ?? $target->status;
            $target->address        = $request->address ?? $target->address;
    
            if ($target->update()) {
                Session::flash('success', "User update Successfully!");
                return redirect('admin/user');
            } else {
                Session::flash('error', "User Update Unuccessfull!");
                return redirect('admin/user/edit');            
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
        User::destroy($id);
        Session::flash('success','User delete successfully');

        return redirect()->back();
    }





}
