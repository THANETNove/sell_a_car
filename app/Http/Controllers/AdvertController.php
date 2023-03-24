<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advert;
use Illuminate\Support\Str;
use DB;
use Auth;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('adverts')->get();
        return view('advert.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('advert.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg'],
            /* 'image' => ['required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'], */
        ]);


        $dateText = Str::random(12);
        $member = new Advert;
   

       
        if($request->hasFile('image')){
            $imagefile = $request->file('image');
            $data =   $imagefile->move(public_path().'/img/advert',$dateText."".$imagefile->getClientOriginalName());
            $dateImg =  $dateText."".$imagefile->getClientOriginalName();
            $member->image =  $dateImg;
            $member->save();
        }
  


        return redirect('advert')->with('message', "บันทึกสำเร็จ" );
        

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
        $data = Advert::find($id);
        return view('advert.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg'],
            /* 'image' => ['required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'], */
        ]);


        $dateText = Str::random(12);

        $member =  Advert::find($id);
        $unimg =  $member->image;
        if ($unimg) {
            $image_path = public_path().'/img/advert/'.$unimg; 
            unlink($image_path);
        }
       
        if($request->hasFile('image')){
            $imagefile = $request->file('image');
            $data =   $imagefile->move(public_path().'/img/advert',$dateText."".$imagefile->getClientOriginalName());
            $dateImg =  $dateText."".$imagefile->getClientOriginalName();
            $member->image =  $dateImg;
            $member->save();
        }
  


        return redirect('advert')->with('message', "บันทึกสำเร็จ" );

  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $flight = Advert::find($id);
        $unimg =  $flight->image;
        if ($unimg) {
            $image_path = public_path().'/img/advert/'.$unimg; 
            unlink($image_path);
        }
        $flight->delete();
        return redirect('advert')->with('message', "ลบโมษณาสำเร็จ" );
    }
}