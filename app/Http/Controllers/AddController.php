<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rubric;
use App\Models\Category;
use App\Models\Type;
use App\Models\Add;


class AddController extends Controller
{
    public function index(){
        $rubrics = Rubric::all();
        $categories = Category::all();
        $types = Type::all();
        return view('form',compact('rubrics','categories','types'));
    }

    public function store(Request $request){
        //return $request->all();
        $this->validate($request, [
    
        'image' => 'required',
        'rubrika' => 'required',
        'typ' => 'required',
        'kategoria' => 'required',
        'nadpis' => 'required',
        'text' => 'required',
        'psc' => 'required',
        'meno' => 'required',
        'tel' => 'required',
        'email' => 'required',
        'heslo' => 'required'

        ]);

        $add = new Add;
        $add->image = $request->image;
        $add->rubrika = $request->rubrika;
        $add->typ = $request->typ;
        $add->kategoria = $request->kategoria;
        $add->nadpis = $request->nadpis;
        $add->text = $request->text;
        $add->psc = $request->psc;
        $add->meno = $request->meno;
        $add->tel = $request->tel;
        $add->email = $request->email;
        $add->heslo = $request->heslo;
        $add->save();
        $add->id;
        return redirect(route('/'))->with('successMsg','Inzerát úspečne pridaný');
    }


    public function test(){
        return view('test');
    }
}

