<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\User;

class Generate extends Model
{

    protected $fillable = [
        
        'codCli', 'name', 'chave', 'duration', 'loja', 'valor','datetimestemp', 'horatimestemp','user_id'
  
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
