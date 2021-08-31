<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use HasFactory;

    protected $table = 'home_sliders';

    protected $fillable = [
        'title',
        'subtitle',
        'price',
        'link',
        'image',
        'status'
    ];
    protected $casts = ['status' => 'boolean'];

    public function getStatus()
    {
        return $this->status == 0 ? 'InActive' : 'Active';
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getImageAttribute($val)
    {

        return $val ? asset('assets/images/sliders/' . $val) : asset('assets/images/img.png');
    }


}
