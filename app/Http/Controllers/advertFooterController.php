<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvertFooter;
use Illuminate\Support\Str;
use DB;
use Auth;

class advertFooterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        //
        if (Auth::user()->status == "admin") { 
            $data = DB::table('advert_footers')->get();
            return view('advertFooter.index',['data' => $data]);
        }else {
            return view('home');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('advertFooter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,webp'],
            /* 'image' => ['required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'], */
        ]);


        $dateText = Str::random(12);
        $member = new AdvertFooter;
   

       
        if($request->hasFile('image')){
            $imagefile = $request->file('image');
            $data =   $imagefile->move(public_path().'/img/advertFooter',$dateText."".$imagefile->getClientOriginalName());
            $dateImg =  $dateText."".$imagefile->getClientOriginalName();
            $member->image =  $dateImg;
            $member->save();
        }
  


        return redirect('advert-footer')->with('message', "บันทึกสำเร็จ" );
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
        $data = AdvertFooter::find($id);
        return view('advertFooter.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,webp'],
            /* 'image' => ['required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'], */
        ]);


        $dateText = Str::random(12);

        $member =  AdvertFooter::find($id);

     
        $unimg =  $member->image;

        if ($unimg) {
            $image_path = public_path().'/img/advertFooter/'.$unimg; 
            unlink($image_path);
        }
       
        if($request->hasFile('image')){
            $imagefile = $request->file('image');
            $data =   $imagefile->move(public_path().'/img/advertFooter',$dateText."".$imagefile->getClientOriginalName());
            $dateImg =  $dateText."".$imagefile->getClientOriginalName();
            $member->image =  $dateImg;
            $member->save();
        }
  


        return redirect('advert-footer')->with('message', "บันทึกสำเร็จ" );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flight = AdvertFooter::find($id);
        $unimg =  $flight->image;
        if ($unimg) {
            $image_path = public_path().'/img/advertFooter/'.$unimg; 
            unlink($image_path);
        }
        $flight->delete();
        return redirect('advert-footer')->with('message', "ลบโมษณาสำเร็จ" );
    }
}