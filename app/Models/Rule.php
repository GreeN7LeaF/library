<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;
    protected $table = "quydinh";

    protected $fillable = [
        'tenqd',
        'noidung',
        'maloai',
    ];
}
