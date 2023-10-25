<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderInfo extends Model
{
    use HasFactory, Sortable;

    public $sortable = [
        'ref_no',
        'title',
        'responsible_person',
        'user_id',
        'po_ref',
        'supplier_id',
        'customer_id',
        'delivery_place',
        'date',
    ];
    
    protected $guarded = [
        'id',
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        });
    }
}
