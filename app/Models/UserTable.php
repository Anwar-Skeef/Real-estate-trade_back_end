<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTable extends Model
{
    use HasFactory;
    protected $table = 'userst';
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'token_verify',
        'verified',
        'crated_at',
        'updated_at'
    ];
    protected $hidden = [
        'password', 'crated_at', 'updated_at'

    ];
    public $timestamps = false;
}
