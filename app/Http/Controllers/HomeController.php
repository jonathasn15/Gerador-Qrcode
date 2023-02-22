<?php

namespace App\Http\Controllers;
use App\models\Generate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home(Request $r) {

        $Generate = Generate::all();  
        //return $Generate;
         return view('home', compact('Generate'));
    }
}
