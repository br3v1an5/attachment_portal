<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttachmentApplication;
use App\Models\Town;
use Illuminate\Http\Request;

class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $towns = [];
        $applications = AttachmentApplication::all();
        foreach ($applications as $application) {
            $town = $application->town;
            $d =  collect($towns);
            if (!$d->contains($town)) {
                $towns[] = $town;
            }
        }
        $unallocated_towns = [];
        foreach ($towns as $un_town) {
            $a_t = Town::where('name', $un_town)->first();
            if ($a_t == null) {
                $unallocated_towns[] = $un_town;
            }
        }
        $towns_array = [];
        foreach ($unallocated_towns as $mytown) {
            $array = [
                'name' => $mytown,
                'amount' => 0
            ];
            $towns_array[] = $array;
        }
        return view('attachment.allocate', compact('towns_array'));
    }

    public function allocate(Request $request)
    {
        foreach ($request->data as $town) {
            $name = $town['name'];
            $amount = $town['amount'];

            Town::create([
                'name' => $name,
                'amount' => $amount
            ]);

            return response()->json(null, 201);
        }
    }

    public function show()
    {
        $towns = Town::orderBy('created_at', 'Desc')->get();
        return view('admin.towns.show', compact('towns'));
    }
    public function edit(Town $town)
    {
        return view('admin.towns.edit', compact('town'));
    }
    public function update(Request $request, Town $town)
    {
        $town->update([
            'amount' => $request->amount
        ]);
        return redirect(route('admin.towns.view'))->with('success', $town->name . ' Token Amount Updated Successfully');
    }
    public function destroy(Town $town)
    {
        $name = $town->name;
        $town->delete();
        return redirect(route('admin.towns.view'))->with('warning', $name . ' Deleted Successfully');
    }
}
