<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\User;
use App\Product;
use App\Category;
use App\Contact;
use App\Http\Requests\TransactionRequest;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
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
        //
        $categories = Category::pluck('name', 'id')->all();
        $products = Product::pluck('name', 'id')->all();
        return view('admin.Transaction.create', compact('categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $users = auth()->user()->id;
        $input = $request->all();
        $input['user_id'] = $users;
        Transaction::create($input);

        $transacts = Transaction::all()->where('user_id', $users);

        return view('admin.Transaction.index', compact('transacts', 'users'));

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
        $user = User::findOrFail($id)->id;
        $transacts = Transaction::all()->where('user_id', $user);
        $users = auth()->user()->id;

        return view('admin.Transaction.index', compact('transacts', 'users'));
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
        $transact = Transaction::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.Transaction.edit', compact('transact', 'categories'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        //
        $transact = Transaction::findOrFail($id);
        $input = $request->all();
        $transact->update($input);

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
        $transact = Transaction::findOrFail($id);
        $contact = Contact::all()->where('transaction_id', $transact->id);
        $transact->delete();
        $contact->delete();

        return redirect('/admin');


    }
    public function productList(Request $request)
    {

        $products = Product::where("category_id", $request->category_id)->pluck('name', 'id')->all();
        // Log::info(print_r($departments, true));
        return response()->json($products);

    }

    // public function createContact(Request $request, $id)
    // {
    //   // $user = auth()->user()->id;
    //   // $input = $request->all();
    //   // $input['user_id'] = $user;
    //   // Transaction::create($input);
    //   //
    //   // return redirect('/admin');
    //
    //   return
    // }
}
