<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all(),200);
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'pricehour' => $request->pricehour,
            'pricekm' => $request->pricekm,
            'image' => $request->image,
            'kmhours' => $request->kmhours,
            'luggage'=> $request->luggage,
            'passengers'=> $request->passengers,
            'forfait1'=> $request->forfait1,
            'forfait2'=> $request->forfait2,
        ]);

        return response()->json([
            'status' => (bool) $product,
            'data'   => $product,
            'message' => $product ? 'Product Created!' : 'Error Creating Product'
        ]);
    }

    public function show(Product $product)
    {
        return response()->json($product,200);
    }

    public function uploadFile(Request $request)
    {
        if($request->hasFile('image')){

            $name = time()."_".$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $name);
        }
        return response()->json(asset("images/$name"),201);
    }

    public function update(Request $request, Product $product)
    {
        $status = $product->update(
            $request->only(['name', 'description', 'pricehour', 'pricekm','image','kmhours','luggage','passengers','forfait1','forfait2'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Product Updated!' : 'Error Updating Product'
        ]);
    }

    public function destroy(Product $product)
    {
        $status = $product->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Product Deleted!' : 'Error Deleting Product'
        ]);
    }
}
