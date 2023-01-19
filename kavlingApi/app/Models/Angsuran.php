<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    use HasFactory;
    protected $table = 'angsuran';
    protected $guarded = [];
    protected $primaryKey = 'id_angsuran';
    protected $hidden = [];
}
