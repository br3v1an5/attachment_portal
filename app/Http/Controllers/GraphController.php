<?php

namespace App\Http\Controllers;

use App\Models\AttachmentApplication;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function index()
    {
        $attachments = AttachmentApplication::all();
        $array = [
            'all_attachments' => $attachments,
        ];
        return response()->json($array, 200);
    }
    public function render()
    {
        return view('attachment.chart');
    }
}
