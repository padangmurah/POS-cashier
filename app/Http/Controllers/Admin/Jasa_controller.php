<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Jasa_controller extends Controller
{
    public function index(){
    	$title = 'Jasa';

    	return view('admin.jasa.jasa_index',compact('title'));
    }
}
