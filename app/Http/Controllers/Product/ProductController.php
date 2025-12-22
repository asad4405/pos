<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Productimage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->latest()->get();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'category_id' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'quantity_alert' => 'required',
            'tax' => 'required',
            'tax_type' => 'required',
            'unit' => 'required',
        ]);

        $product                 = new Product();
        $product->name           = $request->name;
        $product->code           = $request->code;
        $product->category_id    = $request->category_id;
        $product->barcode        = $request->barcode;
        $product->cost           = $request->cost;
        $product->price          = $request->price;
        $product->quantity       = $request->quantity;
        $product->quantity_alert = $request->quantity_alert;
        $product->tax            = $request->tax;
        $product->tax_type       = $request->tax_type;
        $product->unit           = $request->unit;
        $product->note           = $request->note;
        $product->save();

        foreach ($request->file('images') as $image) {
            $path = $image->store('productimage', 'public');

            $productimage = new Productimage();
            $productimage->product_id = $product->id;
            $productimage->image = 'storage/' .$path;
            $productimage->save();
        }

        return redirect()->route('product.index')->with('success', 'New Product Added Success!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
