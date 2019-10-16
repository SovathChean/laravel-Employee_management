<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;
use App\Transaction;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts = Contact::all()->where('transaction_id', $transact);
        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        //
        $input = $request->all();
        $user = auth()->user()->id;
        $id = $request->input('transaction_id');
        $input['transaction_id'] = $id;
        $input['user_id'] = $user;

        Contact::create($input);

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // public function display($id)
     // {
     //     //
     //     // $transact = Transaction::findOrFail($id);
     //     // $contacts = Contact::all()->where('transaction_id', $transact->id);
     //     //
     //     // return view('admin.contact.show', compact('contacts'));
     //
     // }


    public function show($id)
    {
        //
        $transact = Transaction::findOrFail($id);
        $name = Transaction::findOrFail($id)->customer;
        $contacts = Contact::all()->where('transaction_id', $transact->id);
        $user = auth()->user()->id;
        $id = $transact->user_id;

        if($user == $id)
        {
          return view('admin.contact.index', compact('contacts', 'transact', 'name', 'user'));
        }
        else{
          return  view('admin.contact.show', compact('contacts'));
        }
        //
        // return view('admin.contact.index', compact('contacts', 'transact', 'name', 'user'));

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
        $contact = Contact::findOrFail($id);

        return view('admin.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        //
        $contact = Contact::findOrFail($id);
        $input = $request->all();

        $contact->update($input);

        return redirect('/admin');
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

        $contact = Contact::findOrFail($id);

        $contact->delete();

        return redirect('/admin');
    }

}
