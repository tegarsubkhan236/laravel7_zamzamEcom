<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == "admin" || Auth::user()->role == "owner") {
            $orders = Order::all();
            return view('admin.order.index', compact('orders'));
        }
        if (Auth::user()->role == "Marketer") {
            $orders = Order::where('marketing_id', Auth::id())->get();
            return view('marketer.order-index', compact('orders'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Category::all();
        $customer = Customer::all();
        return view('admin.order.add', compact('products', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'products' => 'required',
            'sample' => 'required',
            'desc' => 'nullable',
        ]);
        $order = Order::create($request->all());

        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);
        for ($product = 0; $product < count($products); $product++) {
            if ($products[$product] != '') {
                $order->categories()->attach(
                    $products[$product],
                    ['quantity' => $quantities[$product]],
                );
            }
        }

        return redirect()->route('order.create')->with('status', 'Project Created Successfully');
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

    function action(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == 'edit') {
                $data = array(
                    'status'    =>    $request->status,
                );
                DB::table('orders')
                    ->where('id', $request->id)
                    ->update($data);
            }
            if ($request->action == 'delete') {
                DB::table('orders')
                    ->where('id', $request->id)
                    ->delete();
            }
            return response()->json($request);
        }
    }
}
