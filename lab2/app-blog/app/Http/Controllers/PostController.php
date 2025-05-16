<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
        //1- get all posts from database
//2-send data to view
$posts=[
    ["id"=>1,
    "title"=>"title 1",
    "body"=>"post body",
    "created_by"=>"Donia"],

    [
     "id"=>2,
    "title"=>"title 2",
    "body"=>"post body 2",
    "created_by"=>"Malak"],

    ["id"=>3,
    "title"=>"title 3",
    "body"=>"post body 3",
    "created_by"=>"Rahma"],

    ["id"=>4,
    "title"=>"title 4",
    "body"=>"post body 4",
    "created_by"=>"Mahmoud"],

 ];
 return view("posts.index",["posts"=>$posts]);
    }

    function show($id){
        //1- get one post from posts database
    //2-send data to view
    $post=[
        "id"=>$id,
        "title"=>"title $id",
        "body"=>"post body",
        "created_by"=>"Donia"

     ];
     return view("posts.view",["post"=>$post]);
    }
    function create(){
        return view("posts.create");

    }
    function store(Request $request){
         //1-validate data from html
        //2- insert post in database
        //3- redirect to /posts

        return "Done";
    }

    function edit($id){
        //get old post
        $post=[
            "id"=>$id,
            "title"=>"title 1",
            "body"=>"post body",
            "created_by"=>"Donia"

         ];
         return view("posts.edit",["post"=>$post]);


    }

    function update($id, Request $request){
        //vaildate
        //update
        //redirect to posts
        return("Update Done");
    }

    function destroy($id){
        //delete post where id = $id
        //redirect / posts
        return ("destroy Done");

    }


}
