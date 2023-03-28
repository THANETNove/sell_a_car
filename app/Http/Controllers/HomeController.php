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
    public function index(Request $request)
    {
        $search = $request['search'];
      
        if ( Auth::user()->status != 'admin') {
            $dataAll = DB::table('post_products')
            ->leftJoin('categories', 'post_products.categorie_name_id', '=', 'categories.id')
            ->select('post_products.*', 'categories.categorie_name')
            ->where('post_products.id_user', Auth::user()->id)
            ->where('name_products', 'like', "$search%")
            ->orWhere('product_price', 'like', "$search%")
            ->orderBy('post_products.id','DESC')
            ->paginate(50);
            return view('post_products.index',['dataAll' =>  $dataAll]);
        }else{
            $data = DB::table('add_points')->where('add_points.status', 'null')
            ->leftJoin('users', 'add_points.id_user', '=', 'users.id')
            ->select('add_points.*', 'users.username')
            ->where('users.username', 'like', "$search%")
            ->paginate(100);
            return view('money_customers.index',['data' => $data]);
        }
       /*  return view('home'); */
    }
}