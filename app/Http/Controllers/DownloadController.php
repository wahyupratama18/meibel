<?php

namespace App\Http\Controllers;

use App\Models\{ExerciseFile, MaterialFile};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadController extends Controller
{
    public function material(MaterialFile $files): StreamedResponse
    {
        return $this->download($files->material_path);
    }

    public function exercise(ExerciseFile $files): StreamedResponse
    {
        return $this->download($files->exercise_path);
    }

    public function discussion(ExerciseFile $files): StreamedResponse
    {
        return $this->download($files->discussion_path);
    }

    private function download(string $path): StreamedResponse
    {
        if (Storage::exists($path)) {
            return Storage::download($path);
        }

        abort(404);
    }
}
