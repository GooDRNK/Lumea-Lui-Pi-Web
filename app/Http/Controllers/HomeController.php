<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz = DB::table('quiz')->get();
        return view('home')->with('quiz',$quiz);
    }
    public function edit(Request $req)
    {
        $intrebare = $req->input('intrebare');
        $r1 = $req->input('r1');
        $r2 = $req->input('r2');
        $r3 = $req->input('r3');
        $cor = $req->input('cor');
        $id= $req->input('id');
        DB::table('quiz')->where('ID',$id)->update(['Intrebare'=>$intrebare,'Raspuns1'=>$r1,'Raspuns2'=>$r2,'Raspuns3'=>$r3,'Corect'=>$cor]);
        return back();
    }
}
