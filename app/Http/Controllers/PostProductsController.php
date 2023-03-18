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

        $dataAll = DB::table('post_products')
        ->where('id_user', Auth::user()->id)
        ->orderBy('id','DESC')
        ->paginate(50);
        return view('post_products.index',['dataAll' =>  $dataAll]);
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
        $data = DB::table('point_lowests')->get();
        $dataProduct = PostProducts::find($id);
        return view('post_products.edit',['data' =>  $data,'dataProduct'=> $dataProduct]);
    }
    public function renew(string $id)
    {
        $data = DB::table('point_lowests')->get();
        $dataProduct = PostProducts::find($id);
        return view('post_products.renew',['data' =>  $data,'dataProduct'=> $dataProduct]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dateText = Str::random(12);
        $member =  PostProducts::find($id);;
        $member->name_products = $request['name_products'];
        $member->product_details = $request['product_details'];
        $member->product_price = $request['product_price'];
        $member->hot_zone_price = $request['hot_zone_price'];
     
        $dateImg = [];
        if($request->hasFile('image')){
            $img = json_decode($member->image);
    
            foreach( $img as $image) {
                $image_path = public_path().'/img/product/'.$image; 
                unlink($image_path);
            }
            $imagefile = $request->file('image');
           /*  $image->move(public_path().'/images/product',$dateText."".$image->getClientOriginalName()); */
            foreach ($imagefile as $image) {
              $data =   $image->move(public_path().'/img/product',$dateText."".$image->getClientOriginalName());
              $dateImg[] =  $dateText."".$image->getClientOriginalName();
            }
            $member->image = json_encode($dateImg);
        }
       
        $member->save();

            if ($request['hot_zone_price'] !== null) {
                $user = User::find(Auth::user()->id);
                $zone_price = $request['hot_zone_price'];
            $point =  $user->point;
                if( $zone_price <= $point) {
                    $ponit =  $user->point - $request['hot_zone_price'];
                    $user->point =  $ponit;
                    $user->save();
                }else{
                    return back()->with('error', "point ของคุณไม่พอกรุณาเติม point" );
                }
            }


        return redirect('post_products')->with('message', "บันทึกสำเร็จ" );
    }
public  function updateRenew(Request $request, string $id)
{
   
    $member =  PostProducts::find($id);
    $member->name_products = $member->name_products;
    $member->product_details = $member->product_details;
    $member->product_price =  $member->product_price;
    $member->hot_zone_price =  $member->hot_zone_price;
    $member->status = 'null';
    $member->save();
    if ($request['hot_zone_price'] !== null) {
        $user = User::find(Auth::user()->id);
        $zone_price = $request['hot_zone_price'];
        $point =  $user->point;
        if( $zone_price <= $point) {
            $ponit =  $user->point - $request['hot_zone_price'];
            $user->point =  $ponit;
            $user->save();
        }else{
            return back()->with('error', "point ของคุณไม่พอกรุณาเติม point" );
        }
    }
    return redirect('post_products')->with('message', "ต่ออายุสำเร็จ" );
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