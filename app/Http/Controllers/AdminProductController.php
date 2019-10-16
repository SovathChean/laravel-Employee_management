<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Photo;
use App\Product;
use App\Http\Requests\ProductRequest;



class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('admin.product.');
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
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

      $input = $request->all();
        if($file = $request->file('photo_id'))
                {
                  $name = time().$file->getClientOriginalName();
                  $file->move('image', $name);
                  $photo = Photo::create(['file' => $name]);
                  $input['photo_id'] = $photo->id;
        }

      Product::create($input);

      return redirect('/category');
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
       $category = Category::findOrFail($id)->id;
       $products = Product::all()->where('category_id', $category);
       return view('admin.product.index', compact('products'));


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
        $product = Product::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.product.edit', compact('product', 'categories'));
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

        $products = Product::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('photo_id'))
        {
          $name = time().$file->getClientOriginalName();
          $file->move('image', $name);
          $photo = Photo::create(['file' => $name]);
          $input['photo_id'] = $photo->id;

        }
        $products->update($input);

        return redirect('/category');

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
        $product = Product::findOrFail($id);
        unlink('C:\xampp\htdocs'. $product->photo->file);
        $product->delete();

        return redirect('/category');
    }
}
