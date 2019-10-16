<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Photo;
use App\Role;
use App\Http\Requests\AdminRequest;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('role', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {

        $input = $request->all();
        if($file = $request->file('photo_id'))
        {
          $name = time().$file->getClientOriginalName();
          $file->move('image', $name);
          $photo = Photo::create(['file' => $name]);
          $input['photo_id'] = $photo->id;

        }
        $input['password'] = bcrypt($request->password);
        User::create($input);

        return redirect('/admin');

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
        $user = User::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('photo_id'))
        {
          $name = time().$file->getClientOriginalName();
          $file->move('image', $name);
          $photo = Photo::create(['file' => $name]);
          $input['photo_id'] = $photo->id;

        }
        $input['password'] = bcrypt($request->password);
        $user->update($input);

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
        $user = User::findOrFail($id);
        unlink('C:\xampp\htdocs'. $user->photo->file);
        $user->delete();

        return redirect('/admin');
    }
}
