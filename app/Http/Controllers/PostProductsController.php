<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\PostProducts;
use DB;
use Auth;


class PostProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post_products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post_products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $member = new PostProducts;
        $member->id_user = Auth::user()->id;
        $member->name_products = $request['name_products'];
        $member->product_details = $request['product_details'];
        $member->product_price = $request['product_price'];
        $member->hot_zone_price = $request['hot_zone_price'];
        $member->status = 'null';
        $member->save();

        $dateImg = [];
        if($request->hasFile('image')){
            $imagefile = $request->file('image');
            foreach ($imagefile as $image) {
              $data =   $image->move(public_path().'/img/product',$dateText."".$image->getClientOriginalName());
              $dateImg[] =  $dateText."".$image->getClientOriginalName();
            }
        }
/*     dd($dateImg); */
    $member->image = json_encode($dateImg);

        return redirect('post_products')->with('message', "บันทึกสำเร็จ" );
        
       /*  'id_user',
        'name_products',
        'product_details',
        'product_price',
        'hot_zone_price',
        'image',
        'status' */
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