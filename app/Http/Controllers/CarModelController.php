<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;
use DB;
use Auth;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('car_models')
        ->leftJoin('car_brands', 'car_models.id_car_name', '=', 'car_brands.id')
        ->orderBy('car_models.id','DESC')
         ->select('car_brands.car_brands_name', 'car_models.*')
        ->get();

        return view('car_model.index',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = DB::table('car_brands')
        ->orderBy('id','DESC')
        ->get();
        return view('car_model.create',['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $member =  new CarModel;
        $member->id_car_name = $request['id_car_name'];
        $member->model_name = $request['model_name'];

        $member->save();
        return redirect('car_model')->with('message', "บันทึกสำเร็จ" );
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
        $flight = CarModel::find($id);
        $flight->delete();
        return redirect('car_model')->with('message', "ลบข้อมูลสำเร็จ" );
    }
}