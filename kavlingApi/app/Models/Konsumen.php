<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    use HasFactory;
    protected $table = 'konsumen';
    protected $guarded = [];
    protected $primaryKey = 'id_konsumen';
    protected $hidden = [];
}
