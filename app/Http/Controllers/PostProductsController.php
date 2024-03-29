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
        $dataAll = DB::table('post_products');
        $search = $request['search'];
        if ($search !== null) {
            
            $dataAll =  $dataAll
            ->where('id_user', Auth::user()->id)
            ->leftJoin('categories', 'post_products.categorie_name_id', '=', 'categories.id')
            ->select('post_products.*', 'categories.categorie_name')
            ->where('name_products', 'like', "$search%")
            ->orWhere('product_price', 'like', "$search%")
            ->orderBy('post_products.id','DESC')
            ->paginate(50);
            return view('post_products.index',['dataAll' =>  $dataAll]);
        }else {
            $dataAll =  $dataAll
            ->where('id_user', Auth::user()->id)
            ->leftJoin('categories', 'post_products.categorie_name_id', '=', 'categories.id')
            ->select('post_products.*', 'categories.categorie_name')
            ->orderBy('post_products.id','DESC')
            ->paginate(50);
           
            return view('post_products.index',['dataAll' =>  $dataAll]);
        }

       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = DB::table('point_lowests')->get();
        $manu = DB::table('categories')->get();
        $provinces = DB::table('provinces')->get();
        return view('post_products.create',['data' => $data , 'manu' => $manu,'provinces' => $provinces]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image.*' => ['required', 'image', 'mimes:jpg,png,jpeg,webp'],
            /* 'image' => ['required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'], */
        ]);
        if ($request['categorie_name_id'] == "null") {

            return redirect('create-post_products')->with('errorCategorie', "กรุณาเลือกหมวดหมู่" );

       }
       if ($request['zom_name'] == "null") {

        return redirect('create-post_products')->with('errorZom', "กรุณาเลือกโซน" );
        }
        $data = DB::table('point_lowests')->where('point_lowest',$request['zom_name'])->get();
        $date_point = $data[0]->point_loweste_date;

        $current_date = date('Y-m-d H:i:s');
        $future_date = date('Y-m-d H:i:s', strtotime('+' . $date_point . ' days', strtotime($current_date)));


        $dateText = Str::random(12);
        $member = new PostProducts;
        $member->id_user = Auth::user()->id;
        $member->name_products = $request['name_products'];
        $member->product_details = $request['product_details'];
        $member->product_price = $request['product_price'];
        $member->categorie_name_id = $request['categorie_name_id'];
        $member->sub_category = $request['sub_category'];
        $member->province = $request['province'];
        $member->url_facebook = $request['url_facebook'];
        $member->url_Line = $request['url_Line'];
        $member->zom_name = $request['zom_name'];
        $member->expiration_date = $future_date;
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
   
    if ($request['zom_name'] != "0") {
        $user = User::find(Auth::user()->id);
        $zone_price = $request['zom_name'];

       $point =  $user->point;
        if( $zone_price <= $point) {
            $ponit =  $user->point - $request['zom_name'];
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
        $manu = DB::table('categories')->get();
        $provinces = DB::table('provinces')->get();
        return view('post_products.edit',['data' =>  $data,'dataProduct'=> $dataProduct,'manu'=> $manu,'provinces' =>$provinces]);
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

        if ($request['categorie_name_id'] == "null") {

            return back()->with('errorCategorie', "กรุณาเลือกหมวดหมู่" );

       }
       if ($request['zom_name'] == "null") {

        return back()->with('errorZom', "กรุณาเลือกโซน" );
        }

        $data = DB::table('point_lowests')->where('point_lowest',$request['zom_name'])->get();
        $date_point = $data[0]->point_loweste_date;

        $current_date = date('Y-m-d H:i:s');
        $future_date = date('Y-m-d H:i:s', strtotime('+' . $date_point . ' days', strtotime($current_date)));


        $dateText = Str::random(12);
        $member =  PostProducts::find($id);

            if ($request['zom_name'] != "0" && $request['zom_name'] > $member->zom_name) {

                $user = User::find(Auth::user()->id);
                $zone_price = $request['zom_name'];
            $point =  $user->point;
                if( $zone_price <= $point) {
                    $ponit =  $user->point - $request['zom_name'];
                    $user->point =  $ponit;
                    $user->save();
                }else{
                    return back()->with('error', "point ของคุณไม่พอกรุณาเติม point" );
                }
            }



        $member->name_products = $request['name_products'];
        $member->product_details = $request['product_details'];
        $member->product_price = $request['product_price'];
        $member->categorie_name_id = $request['categorie_name_id'];
        $member->sub_category = $request['sub_category'];
        $member->province = $request['province'];
        $member->url_facebook = $request['url_facebook'];
        $member->url_Line = $request['url_Line'];
        $member->zom_name = $request['zom_name'];
        $member->zom_name = $request['zom_name'];
        $member->expiration_date = $future_date;
     
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
 

        return redirect('post_products')->with('message', "บันทึกสำเร็จ" );
    }

public  function updateRenew(Request $request, string $id)
{
    if ($request['zom_name'] == "null") {

      /*   return redirect('renew-post_products')->with('errorZom', "กรุณาเลือกโซน" ); */
      return back()->with('errorZom', "กรุณาเลือกโซน" );
        }
      
    $data = DB::table('point_lowests')->where('point_lowest',$request['zom_name'])->get();
    $date_point = $data[0]->point_loweste_date;
    $current_date = date('Y-m-d H:i:s');
    $future_date = date('Y-m-d H:i:s', strtotime('+' . $date_point . ' days', strtotime($current_date)));


    PostProducts::where('id', $id)
    ->update(['status' => 'null','expiration_date' => $future_date]);


    if ($request['zom_name'] !== null) {
        $user = User::find(Auth::user()->id);
        $zone_price = $request['zom_name'];
        $point =  $user->point;
        if( $zone_price <= $point) {
            $ponit =  $user->point - $request['zom_name'];
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
       $image =  json_decode($member->image);
     /*    $member->status = $request['exp_cas'];
        $member->save(); */
    
        foreach($image as $image) {
    
            $image_path = public_path().'/img/product/'.$image; 
            unlink($image_path);
        }
        $member->delete();
        return redirect('post_products')->with('message', "ยกเลิกการขายเรียบร้อย" );
        
        
    }
}