<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseItemStatus;
use App\Models\PurchaseOrderItem;
use Illuminate\Http\Request;

class PurchaseItemStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return(Hello);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseItemStatus $purchaseItemStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseItemStatus $purchaseItemStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $purchase_order_item = PurchaseOrderItem::findorFail($id);
        $purchase_order_item_id = $purchase_order_item->id;
        $quantity = $purchase_order_item->quantity;

        $product_id = $purchase_order_item->product_id;
        $product = Product::findorFail($product_id);
        
        $received_quantity = $request->received_quantity;
        $current_quantity = $product->stock;
        $current_quantity += $received_quantity;
        $product->stock = $current_quantity;
        // $product->save();

        // $total_received_quantity = $request->received_quantity + PurchaseItemStatus()::where('purchase_order_item_id', $purchase_order_item_id)->where($product_id, $product->id)->get();

        dd(PurchaseItemStatus()::where('purchase_order_item_id', $purchase_order_item_id)->where($product_id, $product->id)->get());

        $remaining_quantity = $quantity - $received_quantity;

        $purchase_item_status = New PurchaseItemStatus();
        $purchase_item_status->purchase_order_item_id = $purchase_order_item_id;
        $purchase_item_status->remaining_quantity = $remaining_quantity;
        $purchase_item_status->received_quantity = $received_quantity;
        $purchase_item_status->current_quantity = $current_quantity;

        $purchase_item_status->save();
    }

    public function reject(Request $request, $id)
    {
        dd($request->all());
        $purchase_order_item = PurchaseOrderItem::findorFail($id);
        $product_id = $purchase_order_item->product_id;
        
        $product = Product::findorFail($product_id);
        dd($product->product_name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseItemStatus $purchaseItemStatus)
    {
        //
    }
}
