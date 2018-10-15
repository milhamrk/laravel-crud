<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contoh extends Controller{
    function index(){
		return view('contoh');
	}
	
	function halamandua(){
		return view('halamandua');
	}
	function halamantiga(){
		return view('halamantiga');
	}
	function mahasiswa(){
		return view('mahasiswa');
	}
}
