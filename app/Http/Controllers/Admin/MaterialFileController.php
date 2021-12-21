<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{MaterialFile, Category, Material, Temporar};
use App\Http\Requests\{StoreMaterialFileRequest, UpdateMaterialFileRequest};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MaterialFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category, Material $material): View
    {
        return view('admin.material.files.index', ['category' => $category, 'material' => $material]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category, Material $material): View
    {
        return view('admin.material.files.create', ['category' => $category, 'material' => $material]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMaterialFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMaterialFileRequest $request)
    {
        // dd('here');
        $temp = Temporar::where('folder', $request->material_file)
        ->where('for', 'material_file')->first();
        
        DB::transaction(function () use ($temp, $request) {
            
            $materialFile = MaterialFile::create([
                'material_id' => $request->material
            ]);
    
            $materialFile->moveFile($temp);
        });

        return redirect()->route('category.material.file.index', ['category' => $request->category, 'material' => $request->material]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaterialFile  $materialFile
     * @return \Illuminate\Http\Response
     */
    public function show(MaterialFile $materialFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaterialFile  $materialFile
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, Material $material, MaterialFile $file)
    {
        return view('admin.material.files.edit', ['category' => $category, 'material' => $material, 'file' => $file]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMaterialFileRequest  $request
     * @param  \App\Models\MaterialFile  $materialFile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMaterialFileRequest $request, Category $category, Material $material, MaterialFile $file)
    {
        $temp = Temporar::where('folder', $request->material_file)
        ->where('for', 'material_file')->first();
        
        $file->moveFile($temp);

        return redirect()->route('category.material.file.index', ['category' => $category, 'material' => $material]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaterialFile  $materialFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, Material $material, MaterialFile $file)
    {
        $file->deleteFile();

        return redirect()->route('category.material.file.index', ['category' => $category, 'material' => $material]);
    }
}
