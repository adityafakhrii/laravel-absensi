<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->get('search');
            $data_absen = DB::table('absensis')
                ->join('users','absensis.user_id','=','users.id')
                ->where('users.nik', 'like','%'.$search.'%')
                ->orderBy('tgl','desc')
                ->get();
        }
        elseif ($request->has('search_tgl')) {
            $search = $request->get('search_tgl');
            $data_absen = DB::table('absensis')
                ->join('users','absensis.user_id','=','users.id')
                ->where('tgl', 'like','%'.$search.'%')
                ->orderBy('tgl','desc')
                ->get();
        }
        else{
            $data_absen = DB::table('absensis')
                ->join('users','absensis.user_id','=','users.id')
                ->orderBy('tgl','desc')
                ->get();
        }
        
        return view('laporan',compact('data_absen'));
    }

}
