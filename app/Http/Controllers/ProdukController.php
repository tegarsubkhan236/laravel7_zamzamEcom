<?php

namespace App\Http\Controllers;

use App\Category;
use App\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::all();
        $category = Category::all();
        return view('admin.produk.index', compact('data', 'category'));
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'produk_1' => 'required|file|image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width=900,max_height=900',
            'produk_2' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width=900,max_height=900',
            'produk_3' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width=900,max_height=900',
            'desc' => 'required',
            'category_id' => 'required',
            'name' => 'required',
        ]);

        $data = new Produk;

        if ($request->has('produk_1')) {
            $produk1 = $request->File('produk_1');
            $name1 = $produk1->getClientOriginalName();
            $produk1->storeAs('public/produk1/', $name1);
            $data->produk_1 = $name1;
        }
        if ($request->has('produk_2')) {
            $produk2 = $request->File('produk_2');
            $name2 = $produk2->getClientOriginalName();
            $produk2->storeAs('public/produk2/', $name2);
            $data->produk_2 = $name2;
        }
        if ($request->has('produk_3')) {
            $produk3 = $request->File('produk_1');
            $name3 = $produk3->getClientOriginalName();
            $produk3->storeAs('public/produk3/', $name3);
            $data->produk_3 = $name3;
        }
        $data->category_id = $request->category_id;
        $data->desc = $request->desc;
        $data->name = $request->name;
        $data->save();
        return redirect('produk')->with('status', 'The data has been added successfully');
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
}
