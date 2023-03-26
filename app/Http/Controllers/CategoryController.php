<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Str;
use App\Models\Category;


class CategoryController extends Controller
{
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
            $data = DB::table('categories')
            ->orderBy('id','ASC')
            ->paginate(50);
            return view('category_manu.index',['data' => $data]);
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
            return view('category_manu.create');
        }else {
            return view('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,webp'],
        ]);


        $dateText = Str::random(12);
        $member = new Category;
        $member->categorie_name = $request['manu_name'];

       
        if($request->hasFile('image')){
            $imagefile = $request->file('image');
            $data =   $imagefile->move(public_path().'/img/icon',$dateText."".$imagefile->getClientOriginalName());
            $dateImg =  $dateText."".$imagefile->getClientOriginalName();
            $member->image =  $dateImg;
            
        }
        $member->save();
        return redirect('manu')->with('message', "บันทึกสำเร็จ" );
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
        $data = Category::find($id);
        return view('category_manu.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     


        $dateText = Str::random(12);
        $member =  Category::find($id);
        $member->categorie_name = $request['manu_name'];

        $unimg =  $member->image;
        if ($unimg) {
            $image_path = public_path().'/img/icon/'.$unimg; 
            unlink($image_path);
        }
       
        if($request->hasFile('image')){
            $imagefile = $request->file('image');
            $data =   $imagefile->move(public_path().'/img/icon',$dateText."".$imagefile->getClientOriginalName());
            $dateImg =  $dateText."".$imagefile->getClientOriginalName();
            $member->image =  $dateImg;
            
        }
        $member->save();
        return redirect('manu')->with('message', "บันทึกสำเร็จ" );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flight = Category::find($id);
        $unimg =  $flight->image;
        if ($unimg) {
            $image_path = public_path().'/img/icon/'.$unimg; 
            unlink($image_path);
        }
        $flight->delete();
        return redirect('manu')->with('message', "ลบเมนูสำเร็จ" );
    }
}