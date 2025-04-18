<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allParticipant = Participant::count();
        $attendParticipant = Participant::where('absence_time','!=',null)->count();
        $remainingParticipant = Participant::where('absence_time','=',null)->count();
        return view('admin.dashboard', compact('allParticipant', 'attendParticipant', 'remainingParticipant'));
    }
}
