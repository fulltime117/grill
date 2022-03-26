<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    
    protected $fillable = ['ip', 'login'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getOnlineTime()
    {
        $mins = intval(($this->updated_at->timestamp - $this->created_at->timestamp)/60);
        if($mins == 0) {
            return '';
        }elseif($mins > 0){
            return $mins . "min";
        }elseif($mins > 60) {
            return intdiv($mins, 60) . "h " . ($mins%60) . 'min';
        }
        
    }
}
