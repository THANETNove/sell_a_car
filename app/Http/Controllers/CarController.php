<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        /**
     * Create a new controller instance.
     *
     * @return void
     */

    
    public function index()
    {
  
            $dataZone = DB::table('post_products')
            ->orderBy('zom_name','DESC')
            ->paginate(50);
            return view('searchCar.all_car',['dataZone' => $dataZone ]);
  
    }

    /**
     * Show the form for creating a new resource.
     */

     
    public function selectCar(Request $request)
    {

        $search = $request['search'];

        $dataZone = DB::table('post_products')
        ->where('zom_name','!=',"0")
        ->where('status','!=' ,"expired")
        ->where('name_products', 'like', "$search%")
        ->orderBy('id','ASC')
        ->paginate(50);

        
        $dataGree = DB::table('post_products')
        ->where('zom_name','==',"0")
        ->where('status','!=' ,"expired")
        ->where('name_products', 'like', "$search%")
        ->orderBy('id','ASC')
        ->paginate(50);

        return view('searchCar.all_car',['dataZone' => $dataZone,'dataGree' => $dataGree ]);
    }
    public function category(Request $request,$name)
    {

        $search = $name;
        $dataZone = DB::table('post_products')
        ->where('zom_name','!=',"0")
        ->where('status','!=' ,"expired")
        ->where('name_products', 'like', "$search%")
        ->orderBy('id','ASC')
        ->paginate(50);

        
        $dataGree = DB::table('post_products')
        ->where('zom_name','==',"0")
        ->where('status','!=' ,"expired")
        ->where('name_products', 'like', "$search%")
        ->orderBy('id','ASC')
        ->paginate(50);

        return view('searchCar.all_car',['dataZone' => $dataZone,'dataGree' => $dataGree ]);
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

    
        $dataZone = DB::table('post_products')
        ->leftJoin('addresses', 'post_products.id_user', '=', 'addresses.user_id')
        ->select('post_products.*',  'addresses.user_id','addresses.facebook', 'addresses.line', 'addresses.instagram', 'addresses.twitter')
        ->where('post_products.id',$id)
        ->get();


        $search1 = $dataZone[0]->name_products;
        $search2 =  $dataZone[0]->product_details;
        $dataAll = DB::table('post_products')
        ->where('status','!=' ,"expired")
        ->where('name_products', 'like', "$search1%")
        ->orWhere('product_details', 'like', "$search2%")
        ->orderBy('zom_name','DESC')
        ->get();


        return view('searchCar.index',['dataZone' => $dataZone,'dataAll'=> $dataAll ]);

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