<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrderInfo;
use App\Models\Purchase_order_items;

class ApiController extends Controller
{
    
public function product_store(Request $request){


    $info = new PurchaseOrderInfo();
    $info->user_id            = $request->user_id;
    $info->ref_no             = $request->ref_no;
    $info->title              = $request->title;
    $info->po_ref             = $request->po_ref;
    $info->supplier_id        =  $request->supplier_id;
    $info->customer_id        =  $request->customer_id;
    $info->responsible_person =  $request->responsible_person;
    $info->date               =  $request->date;
    $info->delivery_place     =  $request->delivery_place;
    $info->save();

    foreach ($request->items as $key => $value) {

            $item = new Purchase_order_items();
            $item->purchase_order_info_id = $info->id;
            $item->item = array_key_exists('item', $value) ? $value['item']:null;
            $item->shade = array_key_exists('shade', $value) ? $value['shade']:null;
            $item->dimension = array_key_exists('dimension', $value) ? $value['dimension']:null;
            $item->uom = array_key_exists('uom', $value) ? $value['uom']:null;
            $item->color = array_key_exists('color', $value) ? $value['color']:null;
            $item->size = array_key_exists('size', $value) ? $value['size']:null; 
            $item->quantity = array_key_exists('quantity', $value) ? $value['quantity']:null;
            $item->value = array_key_exists('value', $value) ? $value['value']:null;
            $item->style_name = array_key_exists('style_name', $value) ? $value['style_name']:null;
            $item->count = array_key_exists('count', $value) ? $value['count']:null;
            $item->meter = array_key_exists('meter', $value) ? $value['meter']:null;
            $item->quantity_cone = array_key_exists('quantity_cone', $value) ? $value['quantity_cone']:null;
            $item->unit_price = array_key_exists('unit_price', $value) ? $value['unit_price']:null;
            $item->total_price = array_key_exists('total_price', $value) ? $value['total_price']:null;
            $item->remarks =array_key_exists('remarks', $value) ? $value['remarks']:null;
            $item->save();
            
    }

   
   


}













}
