<?php

namespace App\Services;

use App\Post;
use App\Services\Interfaces\PostServiceInterface;

class PostService implements PostServiceInterface
{
    public function createPost(array $data)
    {
        $postData = [
            'author_id' => $data['authorId'],
            'cat_id' => $data['catId'],
            'title' => $data['title'],
            'content' => $data['content']
        ];

        if (isset($data['fImage']) && $data['fImage'])
        {
            $extension = $data['fImage']->getClientOriginalExtension();
            if ($extension != 'png' && $extension != 'jpg' && $extension != 'gif')
            {
                return redirect()->route('post.create')->with('er_message','Bạn chỉ có thể thêm ảnh png, jpg, gif');
            }
            $name = $data['fImage']->getClientOriginalName();
            $image = str_random(4) . "_" . $name;
            while(file_exists("uploads/post/" .$image))
            {
                $image = str_random(4) ."_". $name;
            }
            $data['fImage']->move("uploads/post/", $image);
            $postData['image'] = $image ?: '';
        }

        return Post::create($postData);
    }

    public function updatePost(array $data, $id)
    {
        $post = Post::findOrFail($id);
        $postData = [
            'cat_id' => $data['catId'],
            'title' => $data['title'],
            'content' => $data['content']
        ];

        if (isset($data['fImage']) && $data['fImage'])
        {
            $file = $data['fImage'];
            $extension = $data['fImage']->getClientOriginalExtension();
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
            $postData['image'] = $image ?: '';
        }

        return $post->update($postData);
    }
}