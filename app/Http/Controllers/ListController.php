<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ListController extends Controller
{
    public function exercises(Category $category): View
    {
        return view('users.exercises', ['category' => $category->load('exercises.files')]);
    }

    public function materials(Category $category): View
    {
        return view('users.materials', ['category' => $category->load('materials.files')]);
    }
}
