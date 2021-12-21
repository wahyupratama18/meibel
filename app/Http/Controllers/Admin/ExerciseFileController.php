<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExerciseFileRequest;
use App\Http\Requests\UpdateExerciseFileRequest;
use App\Models\{
    Category,
    Exercise,
    ExerciseFile,
    Temporar
};
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ExerciseFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category, Exercise $exercise): View
    {
        return view('admin.exercise.files.index', ['category' => $category, 'exercise' => $exercise]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category, Exercise $exercise): View
    {
        return view('admin.exercise.files.create', ['category' => $category, 'exercise' => $exercise]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExerciseFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExerciseFileRequest $request)
    {
        $exerciseFile = Temporar::where('folder', $request->exercise_file)
        ->where('for', 'exercise_file')->first();
        
        $discussionFile = Temporar::where('folder', $request->discussion_file)
        ->where('for', 'discussion_file')->first();

        DB::transaction(function () use ($request, $exerciseFile, $discussionFile) {
            $exercise = ExerciseFile::create([
                'exercise_id' => $request->exercise
            ]);

            $exercise->moveFile($exerciseFile, 0)
            ->moveFile($discussionFile, 1)
            ->finalize();
        });

        return redirect()->route('category.exercise.file.index', ['category' => $request->category, 'exercise' => $request->exercise]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExerciseFile  $exerciseFile
     * @return \Illuminate\Http\Response
     */
    public function show(ExerciseFile $exerciseFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExerciseFile  $exerciseFile
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, Exercise $exercise, ExerciseFile $file)
    {
        return view('admin.exercise.files.edit', ['category' => $category, 'exercise' => $exercise, 'file' => $file]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExerciseFileRequest  $request
     * @param  \App\Models\ExerciseFile  $exerciseFile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExerciseFileRequest $request, Category $category, Exercise $exercise, ExerciseFile $file)
    {
        if ($request->exercise_file) {
            $exerciseFile = Temporar::where('folder', $request->exercise_file)
            ->where('for', 'exercise_file')->first();

            $file = $file->moveFile($exerciseFile, 0);
        }

        if ($request->discussion_file) {
            $discussionFile = Temporar::where('folder', $request->discussion_file)
            ->where('for', 'discussion_file')->first();

            $file = $file->moveFile($discussionFile, 1);
        }

        $file->finalize();

        return redirect()->route('category.exercise.file.index', ['category' => $request->category, 'exercise' => $request->exercise]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExerciseFile  $exerciseFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, Exercise $exercise, ExerciseFile $file)
    {
        $file->deleteFile();

        return redirect()->route('category.exercise.file.index', ['category' => $category, 'exercise' => $exercise]);
    }
}
