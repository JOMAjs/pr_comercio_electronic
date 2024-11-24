<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product; 
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/order",
     *     summary="List all order",
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */

    public function index()
    {
        $listOrder = Order::all();
        return $listOrder; 
    }


    /**
     * @OA\Post(
     *     path="/api/order",
     *     summary="List all order",
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */

    public function store(Request $request)
    {
        //
        if (!blank($request->id)) 
        {
            # codigo para actualizar los Order ...
            $update = Order::findOrFail($request->id);
            $update->customer_name = $request->customer_name;
            $update->customer_email = $request->customer_email;
            $update->total_price = $request->total_price;

            $update->update();
           // return $update;

            return response()->json([
                'message' => 'Order item created successfully',
                'data' => $update
            ], 200);

        } else {
            
            # codigo para insertar  los Order ...
            $create = new Order();
            $create->customer_name = $request->customer_name;
            $create->customer_email  = $request->customer_email;
            $create->total_price = $request->total_price;
            
            $create->save();

            return response()->json([
                'message' => 'Order item created successfully',
                'data' => $create
            ], 200);

        }
    }


    /**
     * @OA\Post(
     *     path="/api/order-show",
     *     summary="List all order",
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */

    public function show(Request $request)
    {
        //
        # codigo para buscar el Order asignado ...
        $Order = blank($request->id) ? new Order() : Order::findOrFail($request->id);
        return $Order;
    }


    /**
     * @OA\Post(
     *     path="/api/order/{id}",
     *     summary="List all products",
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=404, description="Not Found")
     * )
     */

    public function destroy(Request $request)
    {
        //
        # codigo para eliminar los Order...
        $destroy = ORder::destroy($request->id);
        return $destroy;
    }


    public function order_create(Request $request) {

        # codigo para insertar  los Order ...
        $listProd = [];
        foreach (Product::select("id")->get() as $prod) {
            $listProd[$prod->id] = $prod;
        }

        $listOrder = [];
        foreach (ORder::select("id")->get() as $order) {
            $listOrder[$order->id] = $order;
        }

        $create = new OrderItem();
        $create->order_id    = $listOrder;
        $create->product_id  = $listProd;
        $create->quantity    = $request->quantity; 
        $create->price       = "200";         
        $create->save();

           // Retornar el OrderItem creado como respuesta
        return response()->json([
            'message' => 'Order item created successfully',
            'data' => $create
        ], 201);

    }

}
