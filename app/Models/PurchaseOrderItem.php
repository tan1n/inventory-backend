<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    use HasFactory, Sortable;

    public $sortable = [
        'purchase_order_info_id',
        'product_id',
        'item',
        'shade',
        'dimension',
        'uom',
        'color',
        'size',
        'quantity',
        'value',
        'style_name',
        'count',
        'meter',
        'quantity_cone',
        'unit_price',
        'total_price',
        'status',
        'remarks',
    ];

    protected $guarded = [
        'id',
    ];

    public function purchaseorderinfo(){
        return $this->belongsTo(PurchaseOrderInfo::class, 'purchase_order_info_id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        });
    }
}
