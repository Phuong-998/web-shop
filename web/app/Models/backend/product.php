<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';

    public function lienket()
    {
        return $this->hasMany(category::class, 'category_id','id');
    }
}
