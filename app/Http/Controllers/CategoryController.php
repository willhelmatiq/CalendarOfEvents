<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::find($id);

        return view("categories.show", compact('category'));
    }

}
