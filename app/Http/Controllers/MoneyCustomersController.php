<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class MoneyCustomersController extends Controller
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
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (Auth::user()->status == "admin") {
            $search = $request['search'];
            if ($search != null) {
                $data = DB::table('add_points')->where('add_points.status', 'null')
                ->leftJoin('users', 'add_points.id_user', '=', 'users.id')
                ->select('add_points.*', 'users.username')
                ->where('users.username', 'like', "$search%")->paginate(1);
                return view('money_customers.index',['data' => $data]);
            }else {
                $data = DB::table('add_points')->where('add_points.status', 'null')
                ->leftJoin('users', 'add_points.id_user', '=', 'users.id')
                ->select('add_points.*', 'users.username')
                ->paginate(100);
                return view('money_customers.index',['data' => $data]);
            }
        }else{
            return view('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        //
    }
    public function repCustomers()
    {
        $data = DB::table('add_points')->where('add_points.status', '!=','null')
        ->leftJoin('users', 'add_points.id_user', '=', 'users.id')
        ->select('add_points.*', 'users.username')
        ->orderBy('add_points.id','DESC')
        ->paginate(100);
        return view('money_customers.rep_customers',['data' => $data]);

    }
    public function products(Request $request)
    {
        if (Auth::user()->status == "admin") { 
            $dataAll = DB::table('post_products');
            $search = $request['search'];
            if ($search != null) {
                $dataAll =  $dataAll
                ->leftJoin('categories', 'post_products.categorie_name_id', '=', 'categories.id')
                ->select('post_products.*', 'categories.categorie_name')
                ->where('post_products.name_products', 'like', "$search%")
                ->orWhere('post_products.product_price', 'like', "$search%")
                ->orderBy('id','DESC')
                ->paginate(100);
                return view('post_products.index',['dataAll' =>  $dataAll]);
            }else{
                $dataAll =  $dataAll
                ->leftJoin('categories', 'post_products.categorie_name_id', '=', 'categories.id')
                ->select('post_products.*', 'categories.categorie_name')
                ->orderBy('post_products.id','DESC')
                ->paginate(50);
                return view('post_all_products.index',['dataAll' =>  $dataAll]);
            }
        }else {
            return view('home');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}