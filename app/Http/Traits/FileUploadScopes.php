<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait FileUploadScopes
{
    public function uploadFile($file, $path): string
    {
        $file = Storage::put($path, $file);
        return basename($file);
    }

    public function updateFile($newFile, $oldFile, $path): string
    {
        $file = Storage::put($path, $newFile);
        Storage::delete($path . '/' . $oldFile);
        return basename($file);
    }

    public function uploadFileWithSpecificName($file, $path, $name): string
    {
        $file = $file->storeAs($path, $name . '.' . $file->extension());
        return basename($file);
    }
}
