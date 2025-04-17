<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Models\Category;

class ParticipantController extends Controller
{
    public function index() {
        $participant = People::orderBy('unique_code', 'ASC')->get();
        return view('participant',compact('participant'));
    }

    public function create() {
        $category = Category::orderBy('cat_name', 'ASC')->get();
        return view('participant_create',compact('category'));
    }

    public function store(Request $req) {
        $this->validate($req,[
            'category' => 'required',
            'name' => 'required',
            'unique_code' => 'required',
            'company' => 'required'
        ]);

        $store = new People();
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
        $store->save();

        return redirect('/participant')->with('message','Participant is created successfully.');
    }
}
