<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Services\PostService;
use Illuminate\Http\Request;
use App\User;
use App\Categories;
use App\Post;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
      $listPost = Post::all();
      return view('admin.post.list',['listPost'=>$listPost]);
    }

    public function create()
    {
      $allCat = Categories::all();

      return view('admin.post.add',['allCat'=>$allCat]);
    }

    public function store(CreatePostRequest $request)
    {
        $post = $this->postService->createPost($request->all());
        if (!$post){
            throw new \Exception('server error', 500);
        }

      return redirect()->route('post.index')->with('message','Thêm thành công!');
    }

    public function edit($id)
    {
      $allCat = Categories::all();
      $editPost = Post::findOrFail($id);

      return view('admin.post.edit',compact('editPost','allCat'));
    }

    public function update(UpdatePostRequest $request, $id)
    {
      $post = $this->postService->updatePost($request->all(), $id);
      if (!$post){
          throw new \Exception('server error', 500);
      }

      return redirect()->route('post.edit',$id)->with('message','Sửa thành công!');
    }

    public function destroy(Request $request, $id)
    {
      $delPost = Post::findOrFail($id);

      if ( $request->ajax() ) {
          $delPost->delete( $request->all() );

          return response(['msg' => 'Post deleted', 'status' => 'success']);
      }
      return response(['msg' => 'Failed deleting the post', 'status' => 'failed']);
    }
}
