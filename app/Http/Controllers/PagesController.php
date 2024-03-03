<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('index');
    }

    
    public function about(){
        $name="Nhien";
        $names = array('Hoang','David','John','Micheal');
        // return view('about')->with('name',$name);
        return view('about',[
            'names'=> $names,
        ]);
        
    }
}
