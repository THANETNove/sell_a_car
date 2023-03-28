<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use DB;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = DB::table('provinces')
            ->orderBy('province_name','ASC')
            ->get();
        return view('province.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('province.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $member =  new Province;
        $member->province_name = $request['province_name'];
        $member->save();
 

        return redirect('create-province')->with('message', "บันทึกสำเร็จ" );
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
        $flight = Province::find($id);
        $flight->delete();
        return redirect('province')->with('message', "ลบข้อมูลสำเร็จ" );
    }
}