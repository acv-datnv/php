<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function getList()
    {
      $list_post = Post::all();
      return view('admin/post/list',['list_post'=>$list_post]);
    }

    public function getAdd()
    {
      return view('admin.post.add');
    }

    public function postAdd(Request $request)
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
      $post_add->title = $request->txtTitle;
      $post_add->content = $request->txtContent;
      if ($request->hasFile('fImage'))
      {
        $file = $request->file('fImage');
        $extension = $file->getClientOriginalExtension();
        if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg')
        {
          return redirect('admin/post/them')->with('er_message','Bạn chỉ có thể thêm ảnh png, jpg, jpeg');
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
      else
      {
        $post_add->image = "abc";
      }

      $post_add->save();

      return redirect('admin/post/add')->with('message','Đã thêm thành công!');
    }

    public function getEdit($id)
    {
      $post_edit = Post::find($id);
      return view('admin.post.edit',['post_edit'=>$post_edit]);
    }

    public function postEdit(Request $request, $id)
    {
      $post_edit = Post::find($id);
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
      $post_edit->title = $request->txtTitle;
      $post_edit->content = $request->txtContent;
      if ($request->hasFile('fImage'))
      {
        $file = $request->file('fImage');
        $extension = $file->getClientOriginalExtension();
        if ($extension != 'png' && $extension != 'jpg' && $extension != 'gif')
        {
          return redirect('admin/post/them')->with('er_message','Bạn chỉ có thể thêm ảnh png, jpg, gif');
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

      return redirect('admin/post/edit/'.$id)->with('message','Sửa thành công!');
    }

    public function getDelete($id)
    {
      $post_del = Post::find($id);
      $post_del->delete();

      return redirect('admin/post/list')->with('message','Đã xóa bài viết!');
    }
}
