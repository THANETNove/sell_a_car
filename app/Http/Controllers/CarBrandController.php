<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarBrand;
use App\Models\CarModel;
use DB;
use Auth;

class CarBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        if (Auth::user()->status == "admin") {
            $data = DB::table('car_brands')
            ->orderBy('id','DESC')
            ->get();
        
            return view('car_brand.index',['data' => $data]);
        }else {
            return view('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('car_brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //car_brands_name

        $member =  new CarBrand;
        $member->car_brands_name = $request['car_name'];
        $member->save();

        return redirect('car_brand')->with('message', "บันทึกสำเร็จ" );
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
        $data =  CarBrand::find($id);

        return view('car_brand.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $member =  CarBrand::find($id);
        $member->car_brands_name = $request['car_name'];
        $member->save();

        return redirect('car_brand')->with('message', "เเก้ไขสำเร็จ" );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

     

        $data = DB::table('car_models')
        ->where('id_car_name', $id)
        ->get();
        foreach( $data as $val) {
            $flight = CarModel::find($val->id);
            $flight->delete();
        }

        $flight = CarBrand::find($id);
        $flight->delete();
        return redirect('car_brand')->with('message', "ลบข้อมูลสำเร็จ" );
        
    }
}