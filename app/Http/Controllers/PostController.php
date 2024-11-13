<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendMessages;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;

class PostController extends Controller
{
    public function main()
    {
        return view('index');
    }
    public function post()
    {
        $posts=Post::orderBy('id','desc')->get();
        return view('Post.post',['posts'=>$posts]);
    }
    public function postcreate()
    {
        return view('Post.postcreate');
    }
    public function store(Request $request)
    {
        //dd(123);
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'text' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->text = $request->text;

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = date("Y-m-d") . '_' . time() . '.' . $extension;

            $file->move('img_uploaded/', $filename);
            $post->img = $filename;
        }

        $post->save();

        return redirect('/post')->with('success', "Ma'lumot muvvafaqiyatli qo'shildi");
    }
    public function postedit(Post $post)
    {
        //dd($post);
        return view('Post.postupdate',['post'=>$post]);
    }
    public function update(Request $request, Post $post)
    {
        //dd($post);
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'text' => 'required|string',
            'img' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->text = $request->text;

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = date("Y-m-d") . '_' . time() . '.' . $extension;

            $file->move('img_uploaded/', $filename);

            $post->img = $filename;
        }
        $post->save();

        return redirect('/post')->with('success', "Ma'lumot muvvafaqiyatli yangilandi");
     }
     public function delete(Post $post)
     {
        //dd($post);
        $post->delete();
        return redirect('/post')->with('success', "Ma'lumot muvvafaqiyatli o'chirildi");

     }
     public function send(User $user,Request $request)
     {
       // dd($request->all());
        $data=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'text'=>'required'
        ]);
       // dd($data);
        Mail::to($user->email)->send(new SendMessages($data));
        return back();

     }
}
