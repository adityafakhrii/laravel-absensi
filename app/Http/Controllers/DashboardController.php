<?php

namespace App\Http\Controllers;
use App\Models\Absensi;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        

        $this->timeZone('Asia/Jakarta');
        $user_id = Auth::user()->id;
        $date = date("d-m-Y"); // 2017-02-01
        $cek_absen = Absensi::where(['user_id' => $user_id, 'tgl' => $date])
                            ->get()
                            ->first();
        if (is_null($cek_absen)) {
            $info = array(
                "status" => "Anda belum mengisi absensi!",
                "btnIn" => "",
                "btnOut" => "disabled");
        } elseif ($cek_absen->keluar == NULL) {
            $info = array(
                "status" => "Jangan lupa absen keluar",
                "btnIn" => "disabled",
                "btnOut" => "");
        } else {
            $info = array(
                "status" => "Absensi hari ini telah selesai!",
                "btnIn" => "disabled",
                "btnOut" => "disabled");
        }

        if ($request->has('search')) {
            $search = $request->get('search');
            $data_absen = DB::table('absensis')
                ->join('users','absensis.user_id','=','users.id')
                ->where('users.nik', 'like','%'.$search.'%')
                ->where('tgl','=', $date)
                ->get();

        }else{
            $data_absen = DB::table('absensis')
                ->join('users','absensis.user_id','=','users.id')
                ->where('tgl','=', $date)
                ->get();
        }

                        
        return view('dashboard',compact('data_absen', 'info'));
    }

    public function timeZone($location){
        return date_default_timezone_set($location);
    }

    public function absen(Request $request){

        $this->timeZone('Asia/Jakarta');
        $user_id = Auth::user()->id;
        $date = date("d-m-Y"); // 2017-02-01
        $time = date("H:i:s"); // 12:31:20

        $absen = new Absensi;
        if(isset($request["btnIn"])) {
            // cek double data
            $cek_double = $absen->where(['tgl' => $date, 'user_id' => $user_id])
                                ->count();
            if ($cek_double > 0) {
                return redirect()->back();
            }

            $absen->create([
                'user_id' => $user_id,
                'tgl' => $date,
                'masuk' => $time,
                'status' => 'hadir',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            return redirect()->back();
        }

        // absen keluar
        elseif (isset($request["btnOut"])) {
            $absen->where(['tgl' => $date, 'user_id' => $user_id])
                ->update([
                    'keluar' => $time,
                    'updated_at' => Carbon::now()
                ]);
            return redirect()->back();
        }

        return $request->all();
    }

    // public function absenout(Request $request){

    //     $this->timeZone('Asia/Jakarta');
    //     $user_id = Auth::user()->id;
    //     $date = date("Y-m-d"); // 2017-02-01
    //     $time = date("H:i:s"); // 12:31:20

    //     if (isset($request->keluar) == NULL) {
    //         Absensi::where(['tgl' => $date, 'user_id' => $user_id])
    //             ->update([
    //                 'keluar' => $time,
    //                 'updated_at' => Carbon::now()
    //             ]);
    //         return redirect()->back();
    //     }

    //     return $request->all();
    // }
}