<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{

    protected $fillable = [
        'original_link', 'short_link'
    ];
    
    use HasFactory;
}
