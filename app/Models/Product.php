<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'product_name',
        'category_id',
        'warehouse_id',
        'factory_id',
        'rack',
        'unit_id',
        'product_code',
        'stock',
        'buying_price',
        'selling_price',
        'product_image',
    ];

    public $sortable = [
        'product_name',
        'category_id',
        'warehouse_id',
        'factory_id',
        'rack',
        'unit_id',
        'product_code',
        'stock',
        'buying_price',
        'selling_price',
    ];

    protected $guarded = [
        'id',
    ];

    protected $with = [
        'category',
        'unit',
        'warehouse',
        'factory',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }
    
    public function factory(){
        return $this->belongsTo(Factory::class, 'factory_id');
    }
    

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('product_name', 'like', '%' . $search . '%');
        });
    }
}
