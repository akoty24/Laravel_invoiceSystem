<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table ='sections';
    protected $guarded = [];

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
