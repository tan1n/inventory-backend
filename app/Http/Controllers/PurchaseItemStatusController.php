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
        dd($request->all());
        $purchase_order_item = PurchaseOrderItem::findorFail($id);
        $product_id = $purchase_order_item->product_id;
        
        $product = Product::findorFail($product_id);
        dd($product->product_name);
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
