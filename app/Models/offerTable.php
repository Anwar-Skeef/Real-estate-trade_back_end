<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferTable extends Model
{
    use HasFactory;
    protected $table = 'offerst';
    protected $fillable = [
        'offer_number',
        'user_email',
        'city',
        'neighborhood',
        'area',
        'rooms',
        'price',
        'details',
        'crated_at', 'updated_at'
    ];
    protected $hidden = [
        'crated_at', 'updated_at'

    ];
    public $timestamps = false;
}
