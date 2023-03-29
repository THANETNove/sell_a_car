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
            ->where('status','!=' ,"expired")
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


    public function searchPoma($name)
    {


        $dataZone = DB::table('post_products')
        ->leftJoin('categories', 'post_products.categorie_name_id', '=', 'categories.id')
        ->select('post_products.*', 'categories.categorie_name')
        ->where('post_products.zom_name','!=',"0")
        ->where('post_products.status','!=' ,"expired")
        ->where('categories.categorie_name', 'like', "$name%")
        ->orderBy('post_products.id','ASC')
        ->paginate(50);

        
        $dataGree = DB::table('post_products')
        ->leftJoin('categories', 'post_products.categorie_name_id', '=', 'categories.id')
        ->select('post_products.*', 'categories.categorie_name')
        ->where('post_products.zom_name','=',"0")
        ->where('post_products.status','!=' ,"expired")
        ->where('categories.categorie_name', 'like', "$name%")
        ->orderBy('post_products.id','ASC')
        ->paginate(50);


        return view('searchCar.all_car',['dataZone' => $dataZone,'dataGree' => $dataGree ]);
    }


    public function category(Request $request,$name)
    {

        $search = $name;
        $dataZone = DB::table('post_products')
        ->leftJoin('categories', 'post_products.categorie_name_id', '=', 'categories.id')
        ->select('post_products.*', 'categories.categorie_name')
        ->where('post_products.zom_name','!=',"0")
        ->where('post_products.status','!=' ,"expired")
        ->where('categories.name_products', 'like', "$search%")
        ->orderBy('post_products.id','ASC')
        ->paginate(50);

        
        $dataGree = DB::table('post_products')
        ->leftJoin('categories', 'post_products.categorie_name_id', '=', 'categories.id')
        ->select('post_products.*', 'categories.categorie_name')
        ->where('post_products.zom_name','==',"0")
        ->where('post_products.status','!=' ,"expired")
        ->where('categories.name_products', 'like', "$search%")
        ->orderBy('post_products.id','ASC')
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