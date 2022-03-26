<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherPage extends Model
{
    use HasFactory;
    
    protected $fillable = ['policy', 'product_supply', 'cancellation', 'business_responsibility'];
}
