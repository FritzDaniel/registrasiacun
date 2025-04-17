<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {

        $category = Category::orderBy('created_at', 'DESC')->get();

        return view('category', compact('category'));
    }

    public function create() {
        return view('category_create');
    }

    public function store(Request $req) {
        $this->validate($req,[
            'cat_name' => 'required',
        ]);

        $store = new Category();
        $store->cat_name = $req['cat_name'];
        $store->save();

        return redirect('/category')->with('message','Category is created successfully.');
    }
}
