<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;


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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if ( Auth::user()->status != 'admin') {
            $dataAll = DB::table('post_products')
            ->where('id_user', Auth::user()->id)
            ->orderBy('id','DESC')
            ->paginate(50);
            return view('post_products.index',['dataAll' =>  $dataAll]);
        }else{
            $data = DB::table('add_points')->where('status', 'null')->get();
            return view('money_customers.index',['data' => $data]);
        }
      
    }
}