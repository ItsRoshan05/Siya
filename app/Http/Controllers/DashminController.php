<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashminController extends Controller
{
    //
    public function index(){
        return view('admin.index');
    }
}
