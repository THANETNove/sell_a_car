<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PointLowest;
use DB;
use Auth;

class PointLowestController extends Controller
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
    public function index()
    {

            if (Auth::user()->status == "admin") {
                $data = DB::table('point_lowests')
                ->orderBy('point_lowest','ASC')
                ->get();
                return view('point_loweste.index',['data' => $data]);
            }else {
                return view('home');
            }
    }
    
    
     



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        if (Auth::user()->status == "admin") {
            return view('point_loweste.create');
        }else {
            return view('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        

        $member = new PointLowest;
        $member->point_lowest = $request['point_loweste'];
        $member->point_loweste_date = $request['point_loweste_date'];
        $member->zom_name = $request['zom_name'];
   
        $member->save();

        return redirect('point-loweste')->with('message', "บันทึกสำเร็จ" );

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
        $member =  PointLowest::find($id);
        $member->point_lowest = $request['point_loweste'];
   
        $member->save();

        return redirect('point-loweste')->with('message', "บันทึกสำเร็จ" );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flight = PointLowest::find($id);

        $flight->delete();
        return redirect('point-loweste')->with('message', "ลบเมนูสำเร็จ" );
    }
}