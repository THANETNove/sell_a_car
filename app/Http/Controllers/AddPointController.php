<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AddPoint;
use DB;
use Auth;



class AddPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('add_point.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = DB::table('bank_names')->get();
        return view('add_point.create',['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request['point_bank_name'] == "null") {
          //  return back()->withErrors(['point_bank_name', 'Name is required']);
             return redirect('create_point')->with('error', "กรุณาเลือกช่องทางการชำระเงิน" );

        }
        $validated = $request->validate([
            'image.*' => ['required', 'image', 'mimes:jpg,png,jpeg'],
            /* 'image' => ['required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'], */
        ]);
dd("ada",$request['point_bank_name']);
        $dateText = Str::random(12);

        $member = new AddPoint;
        $member->point = $request['point'];
        $member->date = $request['date'];
        $member->point_bank_name = $request['point_bank_name'];
        $member->other = $request['other'];

        $dateImg = [];
            if($request->hasFile('image')){
                $imagefile = $request->file('image');
               /*  $image->move(public_path().'/images/product',$dateText."".$image->getClientOriginalName()); */
                foreach ($imagefile as $image) {
                  $data =   $image->move(public_path().'/images/slip',$dateText."".$image->getClientOriginalName());
                  $dateImg[] =  $dateText."".$image->getClientOriginalName();
                }
            }
    /*     dd($dateImg); */
        $member->images = json_encode($dateImg);
         $member->save();

         dd("สำเร็จ");
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