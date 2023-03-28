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
        $data = DB::table('car_models')
        ->leftJoin('categories', 'car_models.id_car_name', '=', 'categories.id')
        ->orderBy('categories.categorie_name','ASC')
         ->select('categories.categorie_name', 'car_models.*')
        ->get();

        return view('car_model.index',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = DB::table('categories')
        ->orderBy('categorie_name','ASC')
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
        $data =  CarModel::find($id);
        $data_car = DB::table('categories')
        ->orderBy('id','ASC')
        ->get();

        return view('car_model.edit',['data' => $data,'data_car' => $data_car]);
    }


    public function get_api_model(string $id)
    {
        
        $data  =   DB::table('car_models')
        ->where('id_car_name',$id)
        ->orderBy('id','ASC')
        ->get();
    
        return  $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $member =  CarModel::find($id);
        $member->id_car_name = $request['id_car_name'];
        $member->model_name = $request['model_name'];
        $member->save();
        return redirect('car_model')->with('message', "เเก้ไขสำเร็จ" );
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