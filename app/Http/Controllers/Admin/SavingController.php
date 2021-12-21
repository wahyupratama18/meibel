<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUploadRequest;
use App\Models\Temporar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SavingController extends Controller
{
    public function store(StoreUploadRequest $request): string
    {
        $file = $request->file($request->for);
        $filename = $file->getClientOriginalName();
        $folder = uniqid().'-'.now()->timestamp;

        $file->storeAs('tmp/'.$folder, $filename);

        Temporar::create([
            'folder' => $folder,
            'file' => $filename,
            'for' => $request->for
        ]);

        $this->directoryDelete();

        return $folder;
    }

    private function directoryDelete()
    {
        $deleted = Temporar::select('folder')->where('created_at', '<=', now()->subDay());

        foreach ($deleted->get() as $delete) {
            Storage::deleteDirectory('tmp'.DIRECTORY_SEPARATOR.$delete->folder);
        }

        $deleted->delete();
    }

    public function delete(Request $request): void
    {
        $folder = $request->getContent();
        $delete = Temporar::select('folder')->where('folder', $folder);

        if ($delete->firstOrFail()) {
            Storage::deleteDirectory('tmp'.DIRECTORY_SEPARATOR.$folder);
            $delete->delete();
        }

    }
}
