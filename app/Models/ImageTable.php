<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageTable extends Model
{
    use HasFactory;

    protected $table = 'imagest';
    protected $fillable = [
        'offer_number',
        'img0',
        'img1',
        'img2',
        'img3',
        'img4',
        'img5',
        'crated_at', 'updated_at'
    ];
    protected $hidden = [
        'crated_at', 'updated_at'

    ];
    public $timestamps = false;
}
