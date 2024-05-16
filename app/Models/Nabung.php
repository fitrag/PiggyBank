<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nabung extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function target(){
        return $this->belongsTo(Target::class);
    }
}
