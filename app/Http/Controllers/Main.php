<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Main extends Controller
{
    // public function home(){
    //     $title = "neosoft";
    //     return view("welcome",["title"=>$title]);
    // }
    // public function about(){
    //     return view("about");
    // }
    // public function gallery(){
    //     return view("gallery");
    // }
    public function emp($id){
        return "Employee:$id";
    }
    public function master(){
        return view('admin/dashboard/master');
    }

    public function changepass(){
        return view('admin/dashboard/category/changepass');
    }

    public function gallery(){
        return view('admin/dashboard/category/gallery');
    }

    public function home(){
        return view('admin/dashboard/category/home');
    }
    public function posts(){
        return view('admin/dashboard/category/posts');
    }
    public function sendposts(Request $req){
        $validatedData=$req->validate([
            'title'=>'required|regex:/^[a-zA-Z ]+$/',
            // 'title'=>'required|min:2|max:50',
            'body'=>'required|min:10|max:500',
            'file'=>'required|mimes:jpg,jpeg,png'
        ],[
            'title.required'=>'Title is required',
            'title.regex'=>"only alphabets are allowed",
            // 'title.min'=>"Minimum 2",
            'body.required'=>'Body is required',
            'body.min'=>'Minium 10'
        ]);
        if($validatedData){
            $title=$req->title;
            $body=$req->body;
            $filename="Image-".time().".".$req->file->extension();
            if($req->file->move(public_path('uploads'),$filename))
        //    return back()->with('success', "title is ".$title." and body is ".$body) ;
               return back()->with('success', "data sent successfully") ;
        }
        else{
            return back()->with('error', "uploading error") ;
        }
    //    $title=$req->title;
    //    $body=$req->body;
    //    echo "title is ".$title." and body is ".$body;
    }
    

}
