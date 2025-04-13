<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Post;

class Admincontroller extends Controller
{
    public function index()
    {
      if(Auth::id())
      {
        $post=Post::all();
        $usertype = Auth()->user()->usertype;
        if($usertype=='user')
        {
            return view('home.homepage', compact('post'));
        }

        else if($usertype=='admin')
        {
            return view('admin.index');
        }
        else
        {
            return redirect()->back();
        }
      }
      else{
        return redirect('/login');
      }
    }

    public function homepage()
    {
      $post = Post::all();

        return view('home.homepage',compact('post'));
    }

    public function services()
{
    $post = Post::all(); // ambil semua post
    return view('home.services', compact('post')); // kirim ke view
}


    public function post_details($id)
    {
      $post = Post::find($id);

      return view('home.post_details', compact('post'));
    }
  }
