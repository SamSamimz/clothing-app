<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function addCart(Product $product, Request $request) 
     {
        $data = $request->user()->carts->cartItem()->where('product_id',$product->id)->first();
        if($data) {
            $data->quantity += 1;
            $data->save();
            return redirect()->back();
        }
        CartItem::create([
            'cart_id' => $request->user()->carts->id,
            'product_id' => $product->id,
            'quantity' => 1,
        ]);
        return redirect()->back();
     }

    public function index()
    {
       $carts = auth()->user()->carts;
        $cartItems = $carts->cartItem;
        return view('user.pages.cart',compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        dd($id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);
        if($request->user()->id == $cartItem->cart->user->id) {
            $cartItem->update(['quantity' => $request->quantity]);
            return redirect()->back();
        }else {
            abort(404);
        }
        
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);
        if($request->user()->id == $cartItem->cart->user->id) {
            $cartItem->delete();
            return redirect()->back();
        }else {
            abort(404);
        }
    }
}
