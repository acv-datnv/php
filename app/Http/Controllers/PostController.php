<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Categories;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
      $list_post = Post::all();
      return view('admin.post.list',['list_post'=>$list_post]);
    }

    public function create()
    {
      $all_cat = Categories::all();

      return view('admin.post.add',['all_cat'=>$all_cat]);
    }

    public function store(Request $request)
    {
      $this->validate($request,
        [
          'txtTitle' => 'required|unique:Posts,title|min:3|max:150',
          'txtContent' => 'required'
        ],
        [
          'txtTitle.required' => 'Bạn chưa nhập tiêu đề',
          'txtTitle.unique' => 'Tiêu đề này đã tồn tại',
          'txtTitle.min' => 'Tiêu đề lớn hơn 3 và nhỏ hơn 150 ký tự',
          'txtTitle.max' => 'Tiêu đề lớn hơn 3 và nhỏ hơn 150 ký tự',

          'txtContent.required' => 'Bạn chưa nhập nội dung'
        ]);
      $post_add = new Post;
      $post_add->author_id = $request->txtUser;
      $post_add->cat_id = $request->slcCategory;
      $post_add->title = $request->txtTitle;
      $post_add->content = $request->txtContent;
      if ($request->hasFile('fImage'))
      {
        $file = $request->file('fImage');
        $extension = $file->getClientOriginalExtension();
        if ($extension != 'png' && $extension != 'jpg' && $extension != 'gif')
        {
          return redirect()->route('post.create')->with('er_message','Bạn chỉ có thể thêm ảnh png, jpg, gif');
        }
        $name = $file->getClientOriginalName();
        $image = str_random(4) . "_" . $name;
        while(file_exists("uploads/post/" .$image))
        {
          $image = str_random(4) ."_". $name;
        }
        $file->move("uploads/post/", $image);
        $post_add->image = $image;
      }
      $post_add->save();

      return redirect()->route('post.index')->with('message','Thêm thành công!');
    }

    public function edit($id)
    {
      $all_cat = Categories::all();
      $post_edit = Post::findOrFail($id);
      return view('admin.post.edit',compact('post_edit','all_cat'));
    }

    public function update(Request $request, $id)
    {
      $post_edit = Post::findOrFail($id);
      $this->validate($request,
        [
          'txtTitle' => 'required|min:3|max:150',
          'txtContent' => 'required'
        ],
        [
          'txtTitle.required' => 'Bạn chưa nhập tiêu đề',
          'txtTitle.min' => 'Tiêu đề lớn hơn 3 và nhỏ hơn 150 ký tự',
          'txtTitle.max' => 'Tiêu đề lớn hơn 3 và nhỏ hơn 150 ký tự',

          'txtContent.required' => 'Bạn chưa nhập nội dung'
        ]);
      $post_edit->cat_id = $request->slcCategory;
      $post_edit->title = $request->txtTitle;
      $post_edit->content = $request->txtContent;
      if ($request->hasFile('fImage'))
      {
        $file = $request->file('fImage');
        $extension = $file->getClientOriginalExtension();
        if ($extension != 'png' && $extension != 'jpg' && $extension != 'gif')
        {
          return redirect()->route('post.create')->with('er_message','Bạn chỉ có thể thêm ảnh png, jpg, gif');
        }
        $name = $file->getClientOriginalName();
        $image = str_random(4) . "_" . $name;
        while(file_exists("uploads/post/" .$image))
        {
          $image = str_random(4) ."_". $name;
        }
        $file->move("uploads/post/", $image);
        // delete old image before add new image
        unlink("uploads/post/".$post_edit->image);
        $post_edit->image = $image;
      }
      $post_edit->save();

      return redirect()->route('post.edit',$id)->with('message','Sửa thành công!');
    }

    public function destroy(Request $request, $id)
    {
      $post_del = Post::findOrFail($id);

      if ( $request->ajax() ) {
          $post_del->delete( $request->all() );

          return response(['msg' => 'Post deleted', 'status' => 'success']);
      }
      return response(['msg' => 'Failed deleting the post', 'status' => 'failed']);
    }
}
