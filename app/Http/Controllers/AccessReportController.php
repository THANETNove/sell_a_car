<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class AccessReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public  function thai_month($month) {
        $months = array(
            1 => 'มกราคม',
            2 => 'กุมภาพันธ์',
            3 => 'มีนาคม',
            4 => 'เมษายน',
            5 => 'พฤษภาคม',
            6 => 'มิถุนายน',
            7 => 'กรกฎาคม',
            8 => 'สิงหาคม',
            9 => 'กันยายน',
            10 => 'ตุลาคม',
            11 => 'พฤศจิกายน',
            12 => 'ธันวาคม',
        );
        return $months[$month];
    }



    public function index()
    {
        //access_report
        if (Auth::user()->status == "admin") {

            $users= DB::table('users')->count();
            $userYear= DB::table('log_user_web_accesses')->count();
            $userYear= DB::table('log_user_web_accesses')->count();
            $currentMonth = date('m'); // ดึงเดือนปัจจุบัน
            $usersByMonth = DB::table('log_user_web_accesses')
                    ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
                    ->where(DB::raw('MONTH(created_at)'), $currentMonth)
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get()
                    ->map(function ($item) {
                        $item->month_name =  $this->thai_month($item->month);
                        return $item;
                    });
            /* dd( $users, $userYear,$usersByMonth); */
            return view('access_report.index',['users'=>$users,'userYear' => $userYear,'usersByMonth'=>$usersByMonth]);
            
        }else{
            return view('home');
        }
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createChart()
    {
        $usersByMonth = DB::table('log_user_web_accesses')
        ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
        ->groupBy('month')
        ->orderBy('month')
        ->get()
        ->map(function ($item) {
            $item->month_name =  $this->thai_month($item->month);
            return $item;
        });
 
      
        return  $usersByMonth;


    }

    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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