<?php

namespace App\Http\Controllers;

use App\CheckSheet;
use Illuminate\Http\Request;

class ChecksheetesController extends Controller
{
    // ['start_time', 'end_time', 'total_cycle','schedule_id'];
    public function index()
    {
        $checksheets=CheckSheet::all();
        return view('admin.checksheets.index', compact('checksheets'));
    }

    public function create()
    {
        //show template
        return view('admin.checksheets.create');
    }

    public function store(StoreCategoriesRequest $request)
    {
        
  // ['start_time', 'end_time', 'total_cycle','schedule_id'];
        $checksheet = CheckSheet::create([
            'start_time'=> $request->start_time,
            'end_time'=>$request->end_time,
            'total_cycle'=>$request->total_cycle,
            'schedule_id'=>$request->schedule_id,
        ]);
        return redirect('/admin/checksheets');

    }

    /**
     * Show the form for editing category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $checksheet = CheckSheet::findOrFail($id);

        return view('admin.checksheets.edit', compact('checksheet'));
    }

    /**
     * Update category in storage.
     *
     * @param  \App\Http\Requests\UpdateCountriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriesRequest $request, $id)
    {
         
        $checksheet = CheckSheet::findOrFail($id);
        $checksheet->update($request->all());
        return redirect()->route('admin.checksheets.index');
    }


    /**
     * Remove Booking from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
        $checksheet = CheckSheet::findOrFail($id);
        $checksheet->delete(); 

        return redirect()->route('admin.checksheets.index');
    }
    
    /**
     * Delete all selected Category at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('checksheet_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = CheckSheet::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Category from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (!Gate::allows('checksheet_delete')) {
            return abort(401);
        }
        $checksheet = CheckSheet::onlyTrashed()->findOrFail($id);
        $checksheet->restore();

        return redirect()->route('admin.checksheets.index');
    }

    /**
     * Permanently delete Category from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (!Gate::allows('checksheet_delete')) {
            return abort(401);
        }
        $checksheet = CheckSheet::onlyTrashed()->findOrFail($id);
        $checksheet->forceDelete();

        return redirect()->route('admin.checksheets.index');
    }
    

}
