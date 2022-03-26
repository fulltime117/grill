<?php

namespace App\Models;

use App\Models\Emailtype;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Email extends Model
{
    use HasFactory;
    
    public function type()
    {
        return $this->belongsTo(Emailtype::class);
    }
}
