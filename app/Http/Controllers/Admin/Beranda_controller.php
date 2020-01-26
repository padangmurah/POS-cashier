<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Beranda_controller extends Controller
{
    public function index(){
    	$title = 'Beranda Admin';
    	// \Session::flash('pesan','Hai..');

    	return view('admin.beranda.beranda_index',compact('title'));
    }
}
