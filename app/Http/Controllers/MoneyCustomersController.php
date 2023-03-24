<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class MoneyCustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
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
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        //
    }
    public function products(Request $request)
    {
        $dataAll = DB::table('post_products');
        $search = $request['search'];
        if ($search != null) {
            $dataAll =  $dataAll
            ->where('name_products', 'like', "$search%")
            ->orWhere('product_price', 'like', "$search%")
            ->orderBy('id','DESC')
            ->paginate(100);
            return view('post_products.index',['dataAll' =>  $dataAll]);
        }else{
            $dataAll =  $dataAll
            ->orderBy('id','DESC')
            ->paginate(50);
            return view('post_all_products.index',['dataAll' =>  $dataAll]);
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