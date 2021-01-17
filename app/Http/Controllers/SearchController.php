<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Post;
use App\Type;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function index(Request $request){
        $categories=Categorie::all();
        $types=Type::all();
        $posts = Post::latest()->get();

        $search_posts=POST::query();
        if($request->filled('today')){
            $today=new DateTime();
            // $today=$today->format('Y-m-d H:i:s');


            $search_posts->where('du','<=',$today)->where('au','>=',$today);
            $search_posts=$search_posts->get();
            return view('posts.index',compact('categories','types','search_posts','posts'));


        }
        if($request->filled('categorie')){
            $search_posts->where('categorie_id',$request->get('categorie'));

        }
        if($request->filled('type')){
            $search_posts->where('type_id',$request->get('type'));

        }

        $search_posts=$search_posts->get();

        return view('posts.index',compact('categories','types','search_posts','posts'));

    }

    
}
