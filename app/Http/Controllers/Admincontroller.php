<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\Experience;

class Admincontroller extends Controller
{
    public function index()
    {
      if(Auth::id())
      {
        $post=Post::all();
        $experiences = Experience::paginate(6); // Get 6 experiences with pagination for homepage
        $usertype = Auth()->user()->usertype;
        if($usertype=='user')
        {
            return view('home.homepage', compact('post', 'experiences'));
        }

        else if($usertype=='admin')
        {
            return redirect()->route('admin.home');
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
      $experiences = Experience::paginate(6); // Get 6 experiences with pagination for homepage

        return view('home.homepage',compact('post', 'experiences'));
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
