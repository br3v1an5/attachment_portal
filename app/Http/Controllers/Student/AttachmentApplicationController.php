<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\ApplyAttachment;
use App\Models\AttachmentApplication;
use App\Notifications\AttachmentSent;
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
        $student = auth()->user()->student;
        if ($student != null) {
            return redirect(route('home'))->with('message', 'Attachment Application Exists For Your Account');
        }
        return  view('attachment.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplyAttachment $request)
    {
        $user = auth()->user();
        // dd($request->all());
        $student = $user->student()->create([
            "phone_number" => $request->phone_number,
            "department" => $request->department,
            "dob" => $request->dob,
            "sel_class" => $request->sel_class,
            "alt_phone" => $request->alt_phone,
        ]);
        $attchment =  $student->attachment_application()->create([
            "attached_dep" => $request->attached_dep,
            "org_email" => $request->org_email,
            "org_no" => $request->org_no,
            "insurance" => $request->insurance,
            "org_name" => $request->org_name,
            "start_date" => $request->start_date,
            "completion_date" => $request->completion_date,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
            "remark" => $request->remark,
            "town" => $request->town,
        ]);
        $user->notify(new AttachmentSent($attchment, $student));
        return $attchment;
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
