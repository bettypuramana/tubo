<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    public function projects()
    {
        return $this->hasMany(ClientProject::class, 'client_id');
    }

}
