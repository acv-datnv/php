<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_user = User::all();

        return view('admin.user.list',['list_user'=>$list_user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
          [
            'txtName' => 'required|min:3|max:100',
            'txtEmail' => 'required|unique:Users,email',
            'txtPass' => 'required|min:8|max:100'
          ],
          [
            'txtName.required' => 'Bạn phải nhập tên!',
            'txtName.min' => 'Tên > 3 và < 100 ký tự!',
            'txtName.max' => 'Tên > 3 và < 100 ký tự!',

            'txtEmail.required' => 'Bạn cần nhập email',
            'txtEmail.unique' => 'Email đã tồn tại',

            'txtPass.required' => 'Bạn chưa nhập password!',
            'txtPass.min' => 'Password > 8 và < 100 ký tự!',
            'txtPass.max' => 'Password > 8 và < 100 ký tự!'
          ]);
          $store_user = new User;
          $store_user->name = $request->txtName;
          $store_user->email = $request->txtEmail;
          $store_user->password = Hash::make($request->txtPass);
          $store_user->save();

          return redirect()->route('user.index')->with('message','Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_user = User::findOrFail($id);
        
        return view('admin.user.edit',compact('edit_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
          [
            'txtName' => 'required|min:3|max:100'
          ],
          [
            'txtName.required' => 'Bạn phải nhập tên!',
            'txtName.min' => 'Tên > 3 và < 100 ký tự!',
            'txtName.max' => 'Tên > 3 và < 100 ký tự!',
          ]);
        $update_user = User::findOrFail($id);
        $update_user->name = $request->txtName;
        $update_user->save();

        return redirect()->route('user.index')->with('message','Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy_user = User::findOrFail($id);
        $destroy_user->delete();

        return redirect()->route('user.index')->with('message','Xóa thành công!');
    }
}
