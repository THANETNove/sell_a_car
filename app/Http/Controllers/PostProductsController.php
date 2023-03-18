<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\PostProducts;
use App\Models\User;
use Illuminate\Support\Str;
use DB;
use Auth;


class PostProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = DB::table('post_products')->where('id_user', Auth::user()->id)->orderBy('id','DESC')->get();
        return view('post_products.index',['data' =>  $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = DB::table('point_lowests')->get();
        return view('post_products.create',['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image.*' => ['required', 'image', 'mimes:jpg,png,jpeg'],
            /* 'image' => ['required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'], */
        ]);

        $dateText = Str::random(12);
        $member = new PostProducts;
        $member->id_user = Auth::user()->id;
        $member->name_products = $request['name_products'];
        $member->product_details = $request['product_details'];
        $member->product_price = $request['product_price'];
        $member->hot_zone_price = $request['hot_zone_price'];
        $member->status = 'null';
     

        $dateImg = [];
        if($request->hasFile('image')){
            $imagefile = $request->file('image');
            foreach ($imagefile as $image) {
              $data =   $image->move(public_path().'/img/product',$dateText."".$image->getClientOriginalName());
              $dateImg[] =  $dateText."".$image->getClientOriginalName();
            }
        }
    $member->image = json_encode($dateImg);
   
    if ($request['hot_zone_price'] !== null) {
        $user = User::find(Auth::user()->id);
        $zone_price = $request['hot_zone_price'];
       $point =  $user->point;
        if( $zone_price <= $point) {
            $ponit =  $user->point - $request['hot_zone_price'];
            $user->point =  $ponit;
            $user->save();
        }else{
            return redirect('create-post_products')->with('error', "point ของคุณไม่พอกรุณาเติม point" );
        }
    }

    $member->save();


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
    public function destroy(Request $request, string  $id)
    {
      

        $member = PostProducts::find($id);
        $member->status = $request['exp_cas'];
        $member->save();

        return redirect('post_products')->with('message', "ยกเลิกการขายเรียบร้อย" );
        
        
    }
}