<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Auth;

class HomeController extends Controller
{
    public function mainSite(){
        return view('landing');
    }

    public function index()
    {
        
         // 
    	$tarea = Task::where('user_id', Auth::user()->id)->first();
       	return view('home')->with('tarea', $tarea);
    }

    public function show($id)
    {
        $tarea = Task::where('id', $id)->where('user_id', Auth::user()->id)->first();
        
    }
}
