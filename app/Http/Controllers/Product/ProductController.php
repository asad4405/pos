<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Productimage;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('status', 1)->latest()->get();
        return view('product.index', compact('products'));
    }

    public function getData()
    {
        $products = Product::with('category')->select('products.*');

        return DataTables::of($products)
            ->addIndexColumn()

            ->addColumn('name', fn($product) => $product->name)

            ->addColumn('category', fn($product) => $product->category->name ?? 'N/A')

            ->addColumn('image', function ($product) {
                $img = Productimage::where('product_id', $product->id)->first();
                return $img
                    ? '<img src="' . asset($img->image) . '" width="65">'
                    : 'No Image';
            })

            ->addColumn('price', fn($product) => $product->price)
            ->addColumn('stock', fn($product) => $product->quantity)

            ->addColumn('status', function ($product) {
                if ($product->status == 1) {
                    return '<span class="text-white badge bg-success">Active</span>';
                } else {
                    return '<span class="text-white badge bg-danger">Deactive</span>';
                }
            })

            ->addColumn('action', function ($product) {
                return '
            <a class="text-white btn btn-sm btn-primary" data-id="' . $product->id . '" data-bs-toggle="modal" data-bs-target="#Edit">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <a href="#" class="btn btn-danger btn-sm" data-id="' . $product->id . '">
                <i class="fa-solid fa-trash"></i>
            </a>';
            })

            ->rawColumns(['image', 'status', 'action'])
            ->make(true);
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
        $product->tax_type       = $request->tax_type;
        if ($request->tax_type == 1) {
            $product->tax        = $product->price * $product->tax / 100;
        } elseif ($request->tax_type == 2) {
            $product->tax        = $request->tax;
        }
        $product->unit           = $request->unit;
        $product->note           = $request->note;
        $product->save();

        $product_images = $request->file('images');
        if ($product_images) {
            foreach ($product_images as $key => $product_image) {
                $imageName          = microtime('.') . '.' . $product_image->getClientOriginalExtension();
                $imagePath          = 'public/uploads/productimage/';
                $product_image->move($imagePath, $imageName);
                $imageUrl = $imagePath . $imageName;

                $product_image                = new Productimage();
                $product_image->product_id    = $product->id;
                $product_image->image  = $imageUrl;
                $product_image->save();
            }
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
