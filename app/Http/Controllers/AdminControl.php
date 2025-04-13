<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\Post;

use Illuminate\Support\Facades\Auth;

class AdminControl extends Controller
{
    public function post_page()
    {
       return view('admin.post_page');
    }

    public function add_post(Request $request)
    {
        $user=Auth()->user();

        $userid = $user->id;

        $name = $user->name;

        $usertype = $user->usertype;

        $post=new Post;

        $post->title = $request->title;

        $post->description = $request->description;

        $post->user_id = $userid;

        $post->post_status = 'active';

        $post->name = $name;

        $post->usertype = $usertype;

        /////////////////////////////////

        $image= $request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('postimage', $imagename);

        /////////////////////////////////

        $post->image = $imagename;

        $post->save();
        return redirect()->back()->with('message', 'Post Added Succes');
    }
    public function show_post()
    {
        $post = Post::all();

        return view('admin.show_post', compact('post'));
    }

    public function delete_post($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->back()->with('message', 'Post Deleted Success');

    }

    public function edit_page($id)
    {
        $post=Post::find($id);

        return view('admin.edit_page', compact('post'));
    }

    public function update_post(Request $request, $id)
    {
        $data=Post::find($id);
        $data->title=$request->title;
        $data->description=$request->description;
        $image=$request->image;
        $post->post_status = 'active';
        if($image)
        {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('postimage', $imagename);
        $data->image = $imagename;
        }
        $data->save();
        return redirect()->back()->with('message','Post updated success');
        return view('admin.edit_page', compact('post'));
    }
}

