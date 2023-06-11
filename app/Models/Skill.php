<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'percentage',
        'user_id'
    ];

    public function user_id()
    {
        return $this->belongsTo(User::class);
    }
}
