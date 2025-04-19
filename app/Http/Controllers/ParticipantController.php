<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Logs;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Carbon\Carbon;

class ParticipantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $participant = Participant::orderBy('unique_code', 'ASC')->get();
        return view('admin.participant.index',compact('participant'));
    }

    public function detail($id) {
        $data = Participant::find($id);
        return view('admin.participant.detail',compact('data'));
    }

    public function create() {
        $category = Category::orderBy('cat_name', 'ASC')->get();
        return view('admin.participant.create',compact('category'));
    }

    public function store(Request $req) {
        $this->validate($req, [
            'category' => 'required',
            'name' => 'required',
            'unique_code' => 'required|unique:participant,unique_code',
            'company' => 'required'
        ], [
            'unique_code.unique' => 'Unique code is already used, input another code.'
        ]);

        $store = new Participant();
        $store->name = $req['name'];
        $store->category_id = $req['category'];
        $store->unique_code = $req['unique_code'];
        $store->company = $req['company'];
        $store->jersey = $req['jersey'];
        $store->no_flight = $req['no_flight'];
        $store->vip = $req['vip'];
        $store->payment_status = $req['payment_status'];
        $store->invitation = $req['invitation'];
        $store->description = $req['description'];
        $store->created_by = Auth::user()->id;
        $store->eligible_to_attend = $req['eligible_to_attend'];
        $store->save();

        $log = new Logs();
        $log->user_id = Auth::user()->id;
        $log->message = $store->name . " data was created by " . Auth::user()->name;
        $log->action = "Participant";
        $log->save();

        return redirect('/dashboard/participant')->with('message','Participant is created successfully.');
    }

    public function edit($id) {
        $category = Category::orderBy('cat_name', 'ASC')->get();
        $data = Participant::find($id);
        return view('admin.participant.edit',compact('category','data'));
    }

    public function update(Request $req, $id) {
        $this->validate($req, [
            'category' => 'required',
            'name' => 'required',
            'unique_code' => 'required|unique:participant,unique_code,' . $id,
            'company' => 'required'
        ], [
            'unique_code.unique' => 'Unique code is already used, input another code.'
        ]);

        $update = Participant::find($id);
        $update->name = $req['name'];
        $update->category_id = $req['category'];
        $update->unique_code = $req['unique_code'];
        $update->company = $req['company'];
        $update->jersey = $req['jersey'];
        $update->no_flight = $req['no_flight'];
        $update->vip = $req['vip'];
        $update->payment_status = $req['payment_status'];
        $update->invitation = $req['invitation'];
        $update->description = $req['description'];
        $update->created_by = Auth::user()->id;
        $update->eligible_to_attend = $req['eligible_to_attend'];
        $update->update();

        $log = new Logs();
        $log->user_id = Auth::user()->id;
        $log->message = $update->name . " data was edited by " . Auth::user()->name;
        $log->action = "Participant";
        $log->save();

        return redirect('/dashboard/participant')->with('message','Participant is updated successfully.');
    }

    public function delete($id) {
        $data = Participant::find($id);
        $data->delete();
        return redirect('/dashboard/participant')->with('message','Participant is delete successfully.');
    }

    public function undoAttend($id) {
        $data = Participant::find($id);
        $data->absence_time = null;
        $data->update();

        $log = new Logs();
        $log->user_id = Auth::user()->id;
        $log->message = $data->name . " attendance was reseted by " . Auth::user()->name;
        $log->action = "Attendance";
        $log->save();

        return redirect('/dashboard/participant/detail/' . $id)->with('message','Participant attendance removed.');
    }

    public function export()
    {
        $type = "xls";
        $participants = Participant::whereNotNull('absence_time') // ambil yang hadir
                        ->orderBy('created_at', 'DESC')
                        ->limit(5)
                        ->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Name');
        $sheet->setCellValue('B1', 'Company');

        $row = 2;

        foreach ($participants as $par) {
            $sheet->setCellValue('A' . $row, $par->name);
            $sheet->setCellValue('B' . $row, $par->company);
            $row++;
        }

        $fileName = 'participants_' . now()->format('Ymd_His') . '.xls';

        // Set header manual
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $writer = new Xls($spreadsheet);
        $writer->save('php://output'); // langsung output ke browser
        exit;
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
        $log->action = "Participant";
        $log->save();

        return redirect()->back()->with('message','Peserta sudah di nyatakan hadir');
    }
}
