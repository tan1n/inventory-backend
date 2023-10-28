<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseItemStatus;
use App\Models\PurchaseOrderInfo;
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
        $purchase_order_info_id = $purchase_order_item->purchase_order_info_id;
        $quantity = $purchase_order_item->quantity;

        $product_id = $purchase_order_item->product_id;
        $product = Product::findorFail($product_id);
        
        
        $status = $request->receive;
        $current_quantity = $product->stock;
        
        if($status == 'in'){
            $received_quantity = $request->received_quantity;
            $current_quantity += $received_quantity;
            $product->stock = $current_quantity;
            $product->save();
        
        
            $old_infos = PurchaseItemStatus::where('product_id', $product_id)->where('purchase_order_item_id',$purchase_order_item_id)->get();

            $total_received_quantity = 0;
            
            
            if(!$old_infos){
                $total_received_quantity = $received_quantity; 
            }else{
                foreach($old_infos as $old_info){
                    $total_received_quantity += $old_info->received_quantity;
                }
            }

            $total_received_quantity += $received_quantity;


            $last_remaining_quantity_row = PurchaseItemStatus::where('product_id', $product_id)->where('purchase_order_item_id',$purchase_order_item_id)->latest()->first();

            if(!$last_remaining_quantity_row){
                $last_remaining_quantity = $quantity;
            }else{
                $last_remaining_quantity = $last_remaining_quantity_row->remaining_quantity;
            }
            
            $remaining_quantity = $last_remaining_quantity - $received_quantity;
            
            $purchase_item_status = New PurchaseItemStatus();
            $purchase_item_status->purchase_order_item_id = $purchase_order_item_id;
            $purchase_item_status->product_id = $product_id;
            $purchase_item_status->status = $status;
            $purchase_item_status->remaining_quantity = $remaining_quantity;
            $purchase_item_status->received_quantity = $received_quantity;
            $purchase_item_status->current_quantity = $current_quantity;

            $purchase_item_status->save();

            $purchase_order_item_update = PurchaseOrderItem::where('id', $id)->where('purchase_order_info_id', $purchase_order_info_id)->where('product_id', $product_id)->first();
            $purchase_order_item_update->received_quantity = $total_received_quantity;
            $purchase_order_item_update->save();

            return redirect()->back(); 
        }

        if($status == 'reject'){
            $received_quantity = 0;        
            
            $old_info = PurchaseItemStatus::where('product_id', $product_id)->where('purchase_order_item_id',$purchase_order_item_id)->latest()->first();           
            
            $totaL_remaining_quantity = 0;
            if(!$old_info){
                $totaL_remaining_quantity = $quantity;
            }else{
                $totaL_remaining_quantity = $old_info->remaining_quantity;  
            }

            $totaL_remaining_quantity -= $request->received_quantity;;

            $purchase_item_status = New PurchaseItemStatus();
            $purchase_item_status->purchase_order_item_id = $purchase_order_item_id;
            $purchase_item_status->product_id = $product_id;
            $purchase_item_status->status = $status;
            $purchase_item_status->remaining_quantity = $totaL_remaining_quantity;
            $purchase_item_status->received_quantity = '0';
            $purchase_item_status->current_quantity = $current_quantity;

            $purchase_item_status->save();

            return redirect()->back(); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseItemStatus $purchaseItemStatus)
    {
        //
    }
}
