<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttachmentApplication;
use Illuminate\Http\Request;

class AttachmentApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attachments = AttachmentApplication::orderBy('created_at', 'ASC')->get();
        return view('admin.attachments', compact('attachments'));
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttachmentApplication  $attachmentApplication
     * @return \Illuminate\Http\Response
     */
    public function show(AttachmentApplication $attachmentApplication)
    {
        return $attachmentApplication;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttachmentApplication  $attachmentApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttachmentApplication $attachmentApplication)
    {
        return $attachmentApplication->delete();
    }
}
