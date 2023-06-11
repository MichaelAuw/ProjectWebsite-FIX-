<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;
    protected $fillable=[
        'Subject',
        'category_id',
        'description',
        'DateFrom',
        'DateTo',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
