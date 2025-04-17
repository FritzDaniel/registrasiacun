<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use Carbon\Carbon;

class LandingController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function detail($id) {
        $people = People::findOrFail($id);
    
        return view('participant_detail', compact('people'));
    }

    public function check(Request $req) {
        $this->validate($req, [
            'uniq_code' => 'required',
        ]);
    
        $code = $req->input('uniq_code'); // ambil nilai uniq_code dari inputan
        $people = People::where('unique_code', $code)->first();
    
        if (!$people) {
            return redirect()->route('landing')->with('error', 'Kode tidak ditemukan.');
        }
    
        // Simpan data people ke session (atau bisa pakai id jika kamu mau cari lagi di halaman detail)
        return redirect()->route('participant_check_detail', ['id' => $people->id]);
    }

    public function attend($id) {
        $people = People::where('id', $id)->first();
        $people->absence_time = Carbon::now();
        $people->update();

        return redirect('/')->with('message','Peserta sudah di nyatakan hadir');
    }
}
