<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $list_cat = Categories::all();

      return view('admin.category.list',['list_cat'=>$list_cat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
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
            'txtName' => 'required|min:3|max:100'
          ],
          [
            'txtName.required' => 'Bạn phải nhập tên!',
            'txtName.min' => 'Tên > 3 và < 100 ký tự!',
            'txtName.max' => 'Tên > 3 và < 100 ký tự!'
          ]);
        $store_cat = new Categories;
        $store_cat->name = $request->txtName;
        $store_cat->save();

        return redirect()->route('category.create')->with('message','Thêm thành công!');
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
        $edit_cat = Categories::findOrFail($id);
        
        return view('admin.category.edit',compact('edit_cat'));
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
          'txtName.max' => 'Tên > 3 và < 100 ký tự!'
        ]);
      $update_cat = Categories::findOrFail($id);
      $update_cat->name = $request->txtName;
      $update_cat->save();

      return redirect()->route('category.index')->with('message','Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy_cat = Categories::findOrFail($id);
        $destroy_cat->delete();

        return redirect()->route('category.index')->with('message','Xóa thành công!');
    }
}
