<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use DB;
use Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = DB::table('addresses')->where('user_id', Auth::user()->id)->count();
       
        if ($menus) {
            $data = DB::table('addresses')->where('user_id', Auth::user()->id)->get();
         /*    $data = Address::find(Auth::user()->id); */
            return view('address.edit', ['data' => $data]);

        }else{
            return view('address.index');
        }
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $member = new Address;
        $member->user_id = Auth::user()->id;
        $member->fname = $request['fname'];
        $member->lname = $request['lname'];
        $member->tel = $request['tel'];
        $member->address = $request['address'];
        $member->subDistrict = $request['subDistrict'];
        $member->district = $request['district'];
        $member->province = $request['province'];
        $member->zipCode = $request['zipCode'];
        $member->facebook = $request['facebook'];
        $member->line = $request['line'];
        $member->instagram = $request['instagram'];
        $member->twitter = $request['twitter'];
        $member->save();

        return redirect('address')->with('message', "บันทึกสำเร็จ" );
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
        
        $member =  Address::find($id);
        $member->fname = $request['fname'];
        $member->lname = $request['lname'];
        $member->tel = $request['tel'];
        $member->address = $request['address'];
        $member->subDistrict = $request['subDistrict'];
        $member->district = $request['district'];
        $member->province = $request['province'];
        $member->zipCode = $request['zipCode'];
        $member->facebook = $request['facebook'];
        $member->line = $request['line'];
        $member->instagram = $request['instagram'];
        $member->twitter = $request['twitter'];
        $member->save();

        return redirect('address')->with('message', "บันทึกสำเร็จ" );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}