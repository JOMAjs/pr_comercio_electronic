<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     summary="List all products",
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */
    public function index()
    {
        $listProduct = Product::all();
        return $listProduct; 
    }

    /**
     * @OA\Post(
     *     path="/api/products",
     *     summary="List all products",
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */

    public function store(Request $request)
    {
        //
        if (!blank($request->id)) 
        {
            # codigo para actualizar los products ...
            $update = Product::findOrFail($request->id);
            $update->name = $request->name;
            $update->description = $request->description;
            $update->price = $request->price;
            $update->stock = $request->stock;

            $update->update();
            return $update;

        } else {
            
            # codigo para insertar  los products ...
            $create = new Product();
            $create->name = $request->name;
            $create->description  = $request->description;
            $create->price = $request->price;
            $create->stock = $request->stock;
            
            $create->save();

        }
    }

    /**
     * @OA\Post(
     *     path="/api/products-show",
     *     summary="List all products",
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */

    public function show(Request $request)
    {
        //
        # codigo para buscar el product asignado ...
        $Product = blank($request->id) ? new Product() : Product::findOrFail($request->id);
        return $Product;
    }

    /**
     * @OA\Post(
     *     path="/api/products/{id}",
     *     summary="List all products",
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */

    public function destroy(Request $request)
    {
        //
        # codigo para eliminar los priduct...
        $destroy = Product::destroy($request->id);
        return $destroy;
    }
}
