<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CheckSheet;
use App\Room;
use App\Housekeeper;
class ChecksheetsController extends Controller
{
    // ['start_time', 'end_time', 'total_cycle', 'room_id','housekeeper_id'];
    
    public function index()
    {
        $checksheets=CheckSheet::all();
        return view('admin.checksheets.index', compact('checksheets'));
    }

    public function create()
    { 
        
        $rooms = Room::get()->pluck('room_number','room_status','id')->prepend(trans('quickadmin.qa_please_select'),'');
        print_r($rooms);
        $housekeepers = Housekeeper::get()->pluck('name','id')->prepend(trans('quckadmin.qa_please_select'),'');
        return view('admin.checksheets.create', compact('rooms','housekeepers'));
 
    }

    public function store(StoreCategoriesRequest $request)
    {
        $checksheet = CheckSheet::create($request->all());
        return redirect('/admin/checksheets');
 
    }
    public function show($id)
    {
       
        return view('admin.checksheets.show' );
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
