<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankName;
use DB;
use Auth;


class BankNameController extends Controller
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
            $data = DB::table('bank_names')->get();
            return view('bank_name.index',['data' => $data]);
        }else {
            return view('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bank_name.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //bank_name

        $member = new BankName;
        $member->bank_name = $request['bank_name'];
   
        $member->save();

        return redirect('bank_name')->with('message', "บันทึกสำเร็จ" );
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
        $flight = BankName::find($id);
        $flight->delete();
        return redirect('bank_name')->with('message', "ลบข้อมูลสำเร็จ" );
    }
}