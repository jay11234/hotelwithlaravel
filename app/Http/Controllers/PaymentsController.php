<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
   // ['customer_id','room_id','card_holder','card_number','expiration_date','payment_type','amount','payment_date'];
    public function index()
    {
        $payments=Payment::all();
        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        //show template
        return view('admin.payments.create');
    }

    public function store(StoreCategoriesRequest $request)
    {
        
 
        $payment = Payment::create([
            'customer_id'=> $request->customer_id,
            'room_id'=> $request->room_id,
            'card_holder'=> $request->card_holder,
            'card_number'=> $request->card_number,
            'expiration_date'=> $request->expiration_date,
            'payment_type'=> $request->payment_type,
            'amount'=> $request->amount,
            'payment_date'=> $request->payment_date,
           
        ]);
        return redirect('/admin/payments');

    }

    /**
     * Show the form for editing category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $payment = Payment::findOrFail($id);

        return view('admin.paymentss.edit', compact('payment'));
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
         
        $payment = Payment::findOrFail($id);
        $payment->update($request->all());
        return redirect()->route('admin.payments.index');
    }


    /**
     * Remove Booking from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
        $payment = Payment::findOrFail($id);
        $payment->delete(); 

        return redirect()->route('admin.payments.index');
    }
    
    /**
     * Delete all selected Category at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('payment_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Payment::whereIn('id', $request->input('ids'))->get();

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
        if (!Gate::allows('payment_delete')) {
            return abort(401);
        }
        $payment = Payment::onlyTrashed()->findOrFail($id);
        $payment->restore();

        return redirect()->route('admin.payments.index');
    }

    /**
     * Permanently delete Category from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (!Gate::allows('payment_delete')) {
            return abort(401);
        }
        $payment = Payment::onlyTrashed()->findOrFail($id);
        $payment->forceDelete();

        return redirect()->route('admin.payments.index');
    }
}
