<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuleType extends Model
{
    use HasFactory;
    protected $table = "quydinh";

    protected $fillable = [
        'tenloai',
        'mota',
    ];
}