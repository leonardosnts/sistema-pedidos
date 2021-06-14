<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $fillable = [
        'client_id',
        'value_total'
    ];

    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

}
