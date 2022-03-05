<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UploadBulkStudentsRequest;
use App\Imports\StudentsImport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadBulkStudentsRequest $request)
    {
        // store the file
        $document_name = time() . '.' . $request->filled_doc->extension();
        $request->filled_doc->move(public_path('tmp/uploads'), $document_name);
        $file = public_path('tmp/uploads/') . $document_name;
        try {
            Excel::import(new StudentsImport, $file);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            // delete the file
            $this->deleteFileFromServer($file);
            return  view('admin.students.upload', compact('failures'));
        }


        dd(User::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Download Template For Students.
     *
     * @param  null
     * @return \Illuminate\Http\Response
     */
    public function template()
    {
        $file = public_path('assets/templates/') . 'students_template.xlsx';

        return response()->download($file, 'StudentTemplate.xlxs');
    }

    private function deleteFileFromServer($filePath)
    {
        if (file_exists($filePath)) {
            @unlink($filePath);
        }
        return;
    }
}
