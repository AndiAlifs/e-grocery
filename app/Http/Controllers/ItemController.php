<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['items'] = Item::all();
        $data['row'] = $data['items']->count() / 5;
        $data['page'] = $data['items']->count() / 10;

        return view('home', compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return view('detail', compact('item'));
    }

    public function add_to_cart($id)
    {

        $nowCart = session()->get('cart');

        $found = false;
        if ($nowCart) {
            foreach ($nowCart as $key => $value) {
                if ($value == $id) {
                    $found = true;
                }
            }
        }

        if (!$found) {
            $nowCart[] = $id;
        }
        session()->put('cart', $nowCart);

        return redirect()->route('cart');
    }

    public function show_cart()
    {
        $cart = session()->get('cart');
        $data['total'] = 0;
        $data['items'] = [];

        if ($cart) {
            foreach ($cart as $value) {
                $item = Item::find($value);
                $data['items'][] = $item;
                $data['total'] += $item->price;
            }
        }
        return view('cart', compact('data'));
    }

    public function remove_from_cart($id)
    {
        $nowCart = session()->get('cart');
        $newCart = [];
        foreach ($nowCart as $value) {
            if ($value != $id) {
                $newCart[] = $value;
            }
        }
        session()->put('cart', $newCart);

        return redirect()->route('cart');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
