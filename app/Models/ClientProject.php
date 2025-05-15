<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientProject extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'project_name',
        'contractor',
    ];

    // (Optional) Relationship to Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
