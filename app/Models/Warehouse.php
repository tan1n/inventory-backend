<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory, Sortable;
    
    protected $fillable = [
        'name',
        'responsible_person',
        'contact_no_responsible',
        'location',
    ];

    public $sortable = [
        'name',
        'responsible_person',
        'contact_no_responsible',
        'location',
    ];

    protected $guarded = [
        'id',
    ];
    
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        });
    }

}
