<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    //
    public function index(){
        //Query Builders
        // $posts = DB::select("SELECT * FROM posts WHERE id=2;",
        // [
        //     'id' => 3
        // ]);


        // $posts = DB::table("posts")
        //         ->where("id",1)
        //         ->select('title')
        //         ->get();

        $posts = DB::table("posts")
        ->where('id','=',5)
        ->delete();
        // ->update([
        //     'title'=>"đã update nội dung",
        //     'body' =>"this is new body",
        // ]);
        // ->insert([
        //     'title' => 'haha',
        //     'body' => 'A new post '
        // ]);
        // ->avg('id');
        // ->sum('id');
        // ->min('id');
        // ->max('id');
        // ->count();//select count(*)
        // ->find(3);//find by id
        // ->whereNotNull("body")
        // ->oldest()
        // ->latest()
        // ->orderBy('id','desc')
        // ->whereBetween("id",[1,3])
        // ->where("created_at",">",now()->subDay())
        // ->orWhere('id','>',0)
        // ->first();
        // ->get();

        dd($posts);//dd=details dump
        // return view('posts.index');
    }
}
