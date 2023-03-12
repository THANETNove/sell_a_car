<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AddPoint;
use Illuminate\Support\Str;
use DB;
use Auth;



class AddPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('add_points')->where('id_user', Auth::user()->id)->get();
        return view('add_point.index',['data' => $data]);
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

             return redirect('create_point')->with('error', "กรุณาเลือกช่องทางการชำระเงิน" );

        }
        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg'],
        ]);

        $dateText = Str::random(12);

        $member = new AddPoint;
        $member->id_user =Auth::user()->id;
        $member->point = $request['point'];
        $member->date = $request['date'];
        $member->status = 'null';
        $member->point_bank_name = $request['point_bank_name'];
        $member->other = $request['other'];

            if($request->hasFile('image')){

                $imagefile = $request->file('image');
                $imagefile->move(public_path().'/img/slip',$dateText."".$imagefile->getClientOriginalName());
                $dateImg =  $dateText."".$imagefile->getClientOriginalName();
                $member->images = $dateImg;
                
            }
        
         $member->save();

         return redirect('add_point')->with('message', "บันทึกสำเร็จ" );
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