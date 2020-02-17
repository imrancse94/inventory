<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

trait ExportExcelTrait
{

    public function exportcsv($heading, $rows, $filename)
    {
        $filename = $filename . '.csv';
        ob_start();
        header('Content-Encoding: UTF-8');
        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Type: text/html; charset=UTF-8');
        header('Content-Disposition: attachment; filename=' . $filename);
        $fp = fopen('php://output', 'w');
        $firstLine = 1;

        foreach ($rows as $row) {
            if ($firstLine == 1) {
                fputcsv($fp, $heading);
                $firstLine = 2;
            }
            fputcsv($fp, $row);
        }
        fclose($fp);
        exit;
    }

    public function exportNsaveServer($heading, $rows, $filename)
    {
        $path = 'admin/exports/' . Auth::user()->id;
        $this->makeDir($path);
        $storageBasePath = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
        $filename = rand() . '_' . $filename;
        $path = $storageBasePath . 'admin\exports\\' . Auth::user()->id . '\\' . $filename;

        $fullpath = 'admin/exports/' . Auth::user()->id . '/' . $filename;

        $fp = fopen($path, 'w');
        $firstLine = 1;

        foreach ($rows as $row) {
            if ($firstLine == 1) {
                fputcsv($fp, $heading);
                $firstLine = 2;
            }
            fputcsv($fp, $row);
        }
        fclose($fp);
        return $fullpath;
    }

}
