<?php

namespace App\Http\Controllers\Student;

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
        return auth()->user()->attachment_application;
    }

    /**
     * Show Form to create  a  resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('attachment.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return  AttachmentApplication::create($request->validated());
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttachmentApplication  $attachmentApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttachmentApplication $attachmentApplication)
    {
        return $attachmentApplication->update($request->validated());
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
