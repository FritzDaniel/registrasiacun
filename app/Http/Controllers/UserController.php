<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $account = User::orderby('id','ASC')->get();
        return view('admin.account.index', compact('account'));
    }

    public function create() {
        return view('admin.account.create');
    }

    public function store(Request $req) {
        $this->validate($req,[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $store = new User();
        $store->name = $req['name'];
        $store->email = $req['email'];
        $store->password = Hash::make($req['password']);
        $store->save();

        return redirect('/dashboard/account')->with('message','Account is created successfully.');
    }

    public function edit($id) {
        $data = User::find($id);
        return view('admin.account.edit', compact('data'));
    }

    public function update(Request $req, $id) {
        $this->validate($req,[
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $update = User::find($id);
        $update->name = $req['name'];
        $update->email = $req['email'];
        if($req['password'] != null) {
            $update->password = Hash::make($req['password']);
        }
        $update->update();

        return redirect('/dashboard/account')->with('message','Account is updated successfully.');
    }
}
