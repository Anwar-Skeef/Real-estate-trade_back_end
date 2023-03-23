<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentTable extends Model
{
    use HasFactory;

    protected $table = 'commentsT';
    protected $fillable = [
        'offer_number',
        'user_name',
        'comment',
        'crated_at', 'updated_at'
    ];
    protected $hidden = [
        'crated_at', 'updated_at'

    ];
    public $timestamps = false;
}
