<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use Carbon\Carbon;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
        
    public function index() {
        return view('admin.attendance.index');
    }

    public function detail($id) {
        $data = Participant::findOrFail($id);
    
        return view('admin.attendance.detail', compact('data'));
    }

    public function check(Request $req) {
        $this->validate($req, [
            'uniq_code' => 'required',
        ]);
    
        $code = $req->input('uniq_code'); // ambil nilai uniq_code dari inputan
        $people = Participant::where('unique_code', $code)->first();
    
        if (!$people) {
            return redirect()->route('attendance')->with('error', 'Kode tidak ditemukan.');
        }
   
        return redirect()->route('attendance.detail', ['id' => $people->id]);
    }

    public function attend($id) {
        $people = Participant::where('id', $id)
            ->where('eligible_to_attend','=', 1)
            ->first();
        $people->absence_time = Carbon::now();
        $people->update();

        $log = new Logs();
        $log->user_id = Auth::user()->id;
        $log->message = $people->name . " was attended and confirmed by " . Auth::user()->name;
        $log->action = "Attendance";
        $log->save();

        return redirect('/dashboard/attendance')->with('message','Peserta sudah di nyatakan hadir');
    }
}
