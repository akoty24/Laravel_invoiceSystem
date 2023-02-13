<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
protected $table='products';
    protected $guarded = [];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
