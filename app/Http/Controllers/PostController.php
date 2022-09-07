<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rubric;
use App\Models\Category;
use App\Models\Type;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        // $post = Post::find(1);
        // $images2 = $post->images;
        return view('index',compact('posts'));
    }
    public function add(){
        $rubrics = Rubric::all();
        // $categories = Category::all();
        $types = Type::all();
        //$id = $request->query('id');
        return view('form',compact('rubrics','types'));
    }

    public function store(Request $request){
        //return $request->all();
        $this->validate($request, [
    
        'images' => 'required',
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'rubrika' => 'required',
        'typ' => 'required',
        'kategoria' => 'required',
        'nadpis' => 'required',
        'text' => 'required',
        'cena' => 'required',
        'psc' => 'required',
        'meno' => 'required',
        'tel' => 'required',
        'email' => 'required',
        'heslo' => 'required'

        ]);

        $post = new Post;
        $post->rubrika = $request->rubrika;
        $post->typ = $request->typ;
        $post->kategoria = $request->kategoria;
        $post->nadpis = $request->nadpis;
        $post->text = $request->text;
        $post->cena = $request->cena;
        $post->psc = $request->psc;
        $post->meno = $request->meno;
        $post->tel = $request->tel;
        $post->email = $request->email;
        $post->heslo = $request->heslo;
        $post->save();
        $postId = $post->id;

        $images = [];
        if ($request->images){
            foreach($request->images as $key => $image)
            {
                $imageName = time().rand(1,99).'.'.$image->extension();  
                $image->move(public_path('images'), $imageName);
                $images[]['name'] = $imageName;
            }
        }
        foreach ($images as $key => $img) {
            // dd($img);
            //Image::create($img, $postId);
            Image::create([
                'post_id' => $postId, 
                'name' => $img['name']
            ]);
            /*
            $image = new Image;
            $image->post_id = $postId;
            $image->name = $img;
            $image->save();*/
        }
        $posts = Post::all();
        $images = DB::table('images')
            ->where('post_id','=','1')
            ->get();
        return redirect(route('index'))->with('successMsg','Student Delete Successfully ');
    }


    public function test(){
        return view('test');
    }
}

