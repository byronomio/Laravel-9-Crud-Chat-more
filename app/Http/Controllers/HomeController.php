<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];
        return view('/content/home', ['breadcrumbs' => $breadcrumbs]);
    }

    public function layout_blank()
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];
        return view('/content/layout-blank', ['breadcrumbs' => $breadcrumbs]);
    }


    
}
