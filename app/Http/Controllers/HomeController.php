<?php

namespace App\Http\Controllers;

use App\Models\{
    Exercise,
    Material,
    User
};
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'materialCount' => Material::count(),
            'exerciseCount' => Exercise::count(),
            'founders' => User::select('profile_photo_path', 'name', 'university_id')
            ->with('university')
            ->admin()->get()
        ]);
    }
}
