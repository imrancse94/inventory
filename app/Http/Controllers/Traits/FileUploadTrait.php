<?php
namespace App\Http\Controllers\Traits;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait FileUploadTrait
{
    private function makeDir($path)
    {
        $storagePath = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
        //dd($storagePath);
        if (!File::exists($storagePath . "/" . $path)) {
            $dir = File::makeDirectory($storagePath . "/" . $path, $mode = 0777, true, true);
        }
    }

    public function uploadFile($file, $path)
    {
        $this->makeDir($path);
        $path = Storage::put($path, $file);
        //dd($path);
        return $path;
    }
    public function getExtension($fileName)
    {
        return trim(explode('.', $fileName)[1]);
    }
}
