<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferSite extends Model
{
    use HasFactory;
    protected $table = 'sitet';
    protected $fillable = [
        'offer_number',
        'lat',
        'lng',
        'crated_at', 'updated_at'
    ];
    protected $hidden = [
        'crated_at', 'updated_at'

    ];
    public $timestamps = false;
}
