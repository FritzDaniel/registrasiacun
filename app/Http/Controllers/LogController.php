<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logs;

class LogController extends Controller
{
    public function index() 
    {
        $logs = Logs::orderBy('created_at','DESC')->simplePaginate(10);
        return view('admin.log.index', compact('logs'));
    }
}
