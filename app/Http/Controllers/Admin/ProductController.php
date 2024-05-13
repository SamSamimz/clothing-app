<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductPost;
use App\Models\Product;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create_products');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductPost $request)
    {
        $validated = $request->validated();
        if($request->hasFile('image')){
            $path = time().'.'.$request->file('image')->getClientOriginalExtension();
            $validated['image'] = $request->file('image')->storeAs('products',$path,'public');
            Product::create($validated);
            return to_route('products.index');
        }else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit_product',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3',
            'description' => 'nullable|string',
            'price' => 'numeric',
            'quantity' => 'numeric|nullable',
            'category' => 'nullable|in:man,woman,baby',
            'image' => 'nullable|image|mimes:png,jpg',
        ]);
        if($request->hasFile('image') && fileExists(public_path('storage/'.$product->image))){
            unlink(public_path('storage/'.$product->image));
            $path = time().'.'.$request->file('image')->getClientOriginalExtension();
            $validated['image'] = $request->file('image')->storeAs('products',$path,'public');
            $product->update($validated);
            return to_route('products.index');
        }else {
            $product->update($validated);
            return to_route('products.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->image){
            if(fileExists(public_path('storage/'.$product->image))){
                unlink(public_path('storage/'.$product->image));
            }
        }
        $product->delete();
        return to_route('products.index');
    }
}
