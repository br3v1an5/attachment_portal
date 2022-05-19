<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function saveFile(Request $request)
    {
        $request->validate([
            'uploaded_file' => 'required'
        ]);
        $document_name = 'student_data' . '.csv';
        $request->uploaded_file->move(public_path('uploads'), $document_name);
        return;
    }
}
