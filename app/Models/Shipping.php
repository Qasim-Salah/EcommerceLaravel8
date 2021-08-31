<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $table = 'shippings';
    protected $fillable = [
        'order_id',
        'firstname',
        'lastname',
        'mobile',
        'email',
        'line1',
        'line2',
        'city',
        'province',
        'country',
        'zipcode',

    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
