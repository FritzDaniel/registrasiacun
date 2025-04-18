<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {

        $category = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.category.index', compact('category'));
    }

    public function create() {
        return view('admin.category.create');
    }

    public function edit($id) {
        $data = Category::find($id);
        return view('admin.category.edit',compact('data'));
    }

    public function store(Request $req) {
        $this->validate($req,[
            'cat_name' => 'required',
        ]);

        $store = new Category();
        $store->cat_name = $req['cat_name'];
        $store->save();

        return redirect('/dashboard/category')->with('message','Category is created successfully.');
    }

    public function update(Request $req, $id) {
        $this->validate($req,[
            'cat_name' => 'required',
        ]);

        $store = Category::find($id);
        $store->cat_name = $req['cat_name'];
        $store->update();

        return redirect('/dashboard/category')->with('message','Category is updated successfully.');
    }

    public function delete($id) {
    
        $data = Category::find($id);
        $data->delete();

        return redirect('/dashboard/category')->with('message','Category is delete successfully.');
    }
}
