<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Online Users"], ['name' => "Users"]
        ];
        return view('/users/showAll', ['breadcrumbs' => $breadcrumbs]);
    }


    
}
